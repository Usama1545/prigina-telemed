<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FirestoreService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\ApiErrorException;
use Stripe\Refund;
use Stripe\Stripe;
use Stripe\Transfer;

class AdminPaymentController extends Controller
{
    public function __construct(protected FirestoreService $firestore) {}

    public function releasePayment(string $appointmentId)
    {
        $appointment = $this->firestore->find('appointments', $appointmentId);

        if (! $appointment) {
            abort(404, 'Appointment not found');
        }

        $doctorId = $appointment['doctorId'] ?? null;

        if (! $doctorId) {
            Log::error('Appointment '.$appointmentId.' has no associated doctor.');

            return back()->withErrors(['payment' => 'Appointment has no associated doctor.']);
        }

        $doctor = $this->firestore->find('doctors', $doctorId);

        if (! $doctor) {
            Log::error('Doctor '.$doctorId.' not found.');

            return back()->withErrors(['payment' => 'Doctor not found.']);
        }

        $stripeAccountId = $doctor['stripeAccountId'] ?? null;
        $payoutsEnabled = $doctor['payoutsEnabled'] ?? $doctor['stripeOnboardingComplete'] ?? false;

        if (! $stripeAccountId || ! $payoutsEnabled) {
            Log::error('Doctor '.$doctorId.' has not completed Stripe payout setup.');

            return back()->withErrors(['payment' => 'Doctor has not completed Stripe payout setup.']);
        }

        $totalAmount = (float) ($appointment['amount'] ?? 0);
        $settings = $this->firestore->first('app_settings') ?? [];
        $commission = (float) ($settings['payment']['defaultPlatformFeePercent'] ?? 30);
        $transferAmount = (int) round($totalAmount * (1 - $commission / 100) * 100); // cents

        if ($transferAmount <= 0) {
            Log::error('Transfer amount is zero after commission for appointment '.$appointmentId);

            return back()->withErrors(['payment' => 'Transfer amount is zero after commission.']);
        }

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $transfer = Transfer::create([
                'amount' => $transferAmount,
                'currency' => 'usd',
                'destination' => $stripeAccountId,
                'transfer_group' => $appointmentId,
                'description' => 'Payout for appointment '.$appointmentId,
            ]);

            $this->firestore->update('appointments', $appointmentId, [
                'payoutStatus' => 'released',
                'stripeTransferId' => $transfer->id,
                'payoutReleasedAt' => now()->toDateTimeString(),
                'updatedBy' => session('auth_uid'),
            ]);

            $netAmount = round($transferAmount / 100, 2);
            $platformFee = round($totalAmount - $netAmount, 2);

            $this->firestore->create('doctor_revenue', [
                'doctorId' => $doctorId,
                'appointmentId' => $appointmentId,
                'amount' => $totalAmount,
                'platformFee' => $platformFee,
                'netAmount' => $netAmount,
                'platformFeePercent' => $commission,
                'stripeTransferId' => $transfer->id,
                'status' => 'paid',
                'releasedAt' => now(),
                'createdAt' => now(),
            ]);

            Cache::forget('admin:stats');
            Log::info('Payout for appointment '.$appointmentId.' released to doctor.');

            return back()->with('success', 'Payment released to doctor successfully.');

        } catch (ApiErrorException $e) {
            Log::error('Stripe transfer failed for appointment '.$appointmentId.': '.$e->getMessage());

            return back()->withErrors(['payment' => 'Stripe error: '.$e->getMessage()]);
        }
    }

    public function refundPayment(string $appointmentId)
    {
        $appointment = $this->firestore->find('appointments', $appointmentId);

        if (! $appointment) {
            abort(404, 'Appointment not found');
        }

        $payoutStatus = $appointment['payoutStatus'] ?? 'held';

        if (in_array($payoutStatus, ['released', 'refunded'])) {
            return back()->withErrors(['payment' => 'Payment cannot be refunded — it has already been '.$payoutStatus.'.']);
        }

        $paymentIntentId = $appointment['paymentIntentId'] ?? null;

        if (! $paymentIntentId) {
            return back()->withErrors(['payment' => 'No Stripe payment intent found for this appointment.']);
        }

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $refund = Refund::create([
                'payment_intent' => $paymentIntentId,
            ]);

            $this->firestore->update('appointments', $appointmentId, [
                'payoutStatus' => 'refunded',
                'stripeRefundId' => $refund->id,
                'payoutRefundedAt' => now()->toDateTimeString(),
                'updatedBy' => session('auth_uid'),
            ]);

            Cache::forget('admin:stats');

            return back()->with('success', 'Payment refunded to patient successfully.');

        } catch (ApiErrorException $e) {
            Log::error('Stripe refund failed for appointment '.$appointmentId.': '.$e->getMessage());

            return back()->withErrors(['payment' => 'Stripe error: '.$e->getMessage()]);
        }
    }
}
