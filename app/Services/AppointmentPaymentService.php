<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\ApiErrorException;
use Stripe\Refund;
use Stripe\Stripe;
use Stripe\Transfer;

/**
 * Releasing an appointment's held payment to the doctor, or refunding it to
 * the patient. Used by the admin payment buttons (AdminPaymentController) and
 * by missed-appointment decisions (AdminMissedAppointmentController).
 *
 * Each method returns null on success, or the error message.
 */
class AppointmentPaymentService
{
    public function __construct(protected FirestoreService $firestore) {}

    public function release(string $appointmentId, array $appointment): ?string
    {
        $doctorId = $appointment['doctorId'] ?? null;

        if (! $doctorId) {
            Log::error('Appointment '.$appointmentId.' has no associated doctor.');

            return 'Appointment has no associated doctor.';
        }

        $doctor = $this->firestore->find('doctors', $doctorId);

        if (! $doctor) {
            Log::error('Doctor '.$doctorId.' not found.');

            return 'Doctor not found.';
        }

        $stripeAccountId = $doctor['stripeAccountId'] ?? null;
        $payoutsEnabled = $doctor['payoutsEnabled'] ?? $doctor['stripeOnboardingComplete'] ?? false;

        if (! $stripeAccountId || ! $payoutsEnabled) {
            Log::error('Doctor '.$doctorId.' has not completed Stripe payout setup.');

            return 'Doctor has not completed Stripe payout setup.';
        }

        $totalAmount = (float) ($appointment['amount'] ?? 0);
        $settings = $this->firestore->find('app_settings', 'payment') ?? [];
        $commission = (float) ($settings['defaultPlatformFeePercent'] ?? 40);
        $transferAmount = (int) round($totalAmount * (1 - $commission / 100) * 100); // cents

        if ($transferAmount <= 0) {
            Log::error('Transfer amount is zero after commission for appointment '.$appointmentId);

            return 'Transfer amount is zero after commission.';
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

            return null;
        } catch (ApiErrorException $e) {
            Log::error('Stripe transfer failed for appointment '.$appointmentId.': '.$e->getMessage());

            return 'Stripe error: '.$e->getMessage();
        }
    }

    public function refund(string $appointmentId, array $appointment): ?string
    {
        $payoutStatus = $appointment['payoutStatus'] ?? 'held';

        if (in_array($payoutStatus, ['released', 'refunded'])) {
            return 'Payment cannot be refunded — it has already been '.$payoutStatus.'.';
        }

        $paymentIntentId = $appointment['paymentIntentId'] ?? null;

        if (! $paymentIntentId) {
            return 'No Stripe payment intent found for this appointment.';
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

            return null;
        } catch (ApiErrorException $e) {
            Log::error('Stripe refund failed for appointment '.$appointmentId.': '.$e->getMessage());

            return 'Stripe error: '.$e->getMessage();
        }
    }
}
