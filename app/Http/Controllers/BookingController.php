<?php

namespace App\Http\Controllers;

use App\Mail\NewAppointmentBooked;
use App\Mail\NewAppointmentNotification;
use App\Models\Firestore\Appointment;
use App\Models\Firestore\AppSetting;
use App\Models\Firestore\Doctor;
use App\Services\DoctorAvailabilityService;
use App\Services\FirestoreService;
use Carbon\Carbon;
use Flutterwave\Flutterwave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Kreait\Firebase\Contract\Storage;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class BookingController extends Controller
{
    protected $doctors;

    protected $appSetting;

    protected $appointments;

    protected $availabilityService;

    const STRIPE_FEE_PERCENT = 4;

    public function __construct(Doctor $doctors, AppSetting $appSetting, Appointment $appointments, DoctorAvailabilityService $availabilityService)
    {
        $this->doctors = $doctors;
        $this->appSetting = $appSetting;
        $this->appointments = $appointments;
        $this->availabilityService = $availabilityService;
    }

    public function BookingSlots($id)
    {
        $result = $this->availabilityService->getAvailability($id);

        if (! $result) {
            return redirect()
                ->back()
                ->with('error', 'This doctor has not set their availability yet. Please check back later.');
        }

        $doctor = $result['doctor'];
        $availability = $result['availability'];
        $title = 'Select Available Slots';

        return view('booking', compact('doctor', 'title', 'availability'));
    }

    /**
     * JSON list of a doctor's open slots for the next 7 days, optionally
     * excluding one appointment's own slot (used when rescheduling it).
     */
    public function availableSlots(Request $request, $id)
    {
        $result = $this->availabilityService->getAvailability($id, $request->query('exclude'));

        if (! $result) {
            return response()->json([
                'success' => false,
                'message' => 'This doctor has not set their availability yet.',
            ], 422);
        }

        return response()->json([
            'success' => true,
            'availability' => $result['availability'],
        ]);
    }

    public function processBooking(Request $request)
    {
        $validated = $request->validate([
            'doctor_id' => 'required',
            'doctor_name' => 'required',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'selected_slot' => 'required|string',
            'selected_date' => 'required|string',
            'payment_gateway' => 'required|in:stripe,flutterwave',
            'symptoms' => 'nullable|string',
            'documents' => 'nullable|array',
            'documents.*' => 'nullable|file|max:10240',
            'problem' => 'nullable|string',
            'amount' => 'required|numeric',
        ]);
        $firestore = app(FirestoreService::class);

        $user = current_user();
        $setting = $this->appSetting->first();

        // Get doctor details for timezone
        $doctor = $this->doctors->find($validated['doctor_id']);
        $slotDuration = $setting['slotDuration'] ?? 30;

        $startTime = strtotime($validated['selected_slot']);
        $endTime = $startTime + $slotDuration * 60;

        // Format times for display
        $startTimeFormatted = date('h:i A', $startTime); // 3:30 PM format
        $endTimeFormatted = date('h:i A', $endTime);

        // Get current UTC time
        $now = Carbon::now('UTC');

        // Slot times are the doctor's own working-hours values, stored and shown
        // as-is with no timezone conversion — the doctor's timezone is displayed
        // alongside the time so patients can convert it themselves if needed.
        $startDateTime = Carbon::parse($validated['selected_date'].' '.date('H:i:s', $startTime), 'UTC');
        $endDateTime = Carbon::parse($validated['selected_date'].' '.date('H:i:s', $endTime), 'UTC');
        $documentId = uniqid();

        // Convert to UTC for storage
        $startTimeUTC = $startDateTime->copy()->setTimezone('UTC');
        $endTimeUTC = $endDateTime->copy()->setTimezone('UTC');

        // Reject stale/tampered submissions for a slot that has already passed
        // (e.g. the booking page was left open across midnight before submitting).
        if ($startTimeUTC->lte($now)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'The selected time slot is no longer available. Please choose a different date or time.');
        }

        $documentUrls = [];

        if ($request->hasFile('documents')) {
            /** @var Storage $storage */
            $storage = app('firebase.storage');
            $bucket = $storage->getBucket();

            foreach ($request->file('documents') as $file) {
                $fileName = time().'_'.uniqid().'_'.$file->getClientOriginalName();
                $filePath = "appointment_documents/{$documentId}/{$fileName}";

                $bucket->upload(
                    fopen($file->getRealPath(), 'r'),
                    [
                        'name' => $filePath,
                        'predefinedAcl' => 'publicRead',
                    ]
                );

                $documentUrls[] = 'https://storage.googleapis.com/'.$bucket->name().'/'.$filePath;
            }
        }
        $consultationFee = (float) $validated['amount'];
        $stripeFee = round($consultationFee * (self::STRIPE_FEE_PERCENT / 100), 2);
        $settings = $firestore->find('app_settings', 'payment') ?? [];
        $commission = (float) ($settings['defaultPlatformFeePercent'] ?? 30);
        $transferAmount = (int) round($consultationFee * (1 - $commission / 100) * 100); // cents
        $netAmount = round($transferAmount / 100, 2);
        $platformFee = round($consultationFee - $netAmount, 2);
        $appointmentData = [
            'id' => $documentId,
            'doctorId' => $validated['doctor_id'],
            'doctorName' => $validated['doctor_name'],
            'doctorTimezone' => $doctor['timezone'] ?? 'UTC',
            'patientId' => $user['uid'],
            'patientName' => $validated['name'],
            'patientTimezone' => $user['timezone'] ?? 'UTC', // Assuming user has timezone field
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'date' => $startDateTime,
            'startTime' => $startTimeFormatted,
            'endTime' => $endTimeFormatted,
            'startTimeUTC' => $startTimeUTC,
            'endTimeUTC' => $endTimeUTC,
            'amount' => (float) $validated['amount'] ?? $doctor['consultationFee'],
            'paymentMethod' => $validated['payment_gateway'] === 'stripe' ? 'Debit Card' : 'Flutterwave',
            'symptoms' => $validated['symptoms'],
            'notes' => $validated['problem'],
            'documentUrls' => $documentUrls,
            'status' => 'pending',
            'patientLocalTime' => $startTimeFormatted.' - '.$endTimeFormatted,
            'doctorLocalTime' => $startDateTime->format('h:i A').' - '.$endDateTime->format('h:i A'),
            'createdAt' => now(),
            'updatedAt' => now(),
            'totalAmount' => $consultationFee + $stripeFee,
            'transactionFee' => $stripeFee ?? 0,
            'platformFeePercent' => $commission ?? 30,
            'doctorAmount' => $netAmount ?? 0,
            'platformCommission' => $platformFee ?? 0,
        ];

        $appointment = $firestore->createWithId('appointments', $documentId, $appointmentData);

        // Redirect based on selected gateway
        if ($validated['payment_gateway'] === 'stripe') {
            return $this->initiateStripePayment($appointment);
        } else {
            return $this->initiateFlutterwavePayment($appointment);
        }
    }

    private function initiateStripePayment($bookingData)
    {
        session(['pending_booking_doctor_id' => $bookingData['doctorId']]);

        Stripe::setApiKey(config('services.stripe.secret'));

        $consultationFee = (float) $bookingData['amount'];
        $stripeFee = round($consultationFee * (self::STRIPE_FEE_PERCENT / 100), 2);

        $lineItems = [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Doctor Consultation',
                    'description' => 'Appointment with Dr. '.$bookingData['doctorName'],
                ],
                'unit_amount' => (int) round($consultationFee * 100),
            ],
            'quantity' => 1,
        ]];

        if ($stripeFee > 0) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Stripe Payment Processing Fee',
                        'description' => self::STRIPE_FEE_PERCENT.'% card processing fee',
                    ],
                    'unit_amount' => (int) round($stripeFee * 100),
                ],
                'quantity' => 1,
            ];
        }

        $checkoutSession = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('booking.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('booking.cancel'),
            'metadata' => [
                'booking_id' => $bookingData['id'],
            ],
        ]);

        return redirect($checkoutSession->url);
    }

    private function initiateFlutterwavePayment($bookingData)
    {
        session(['pending_booking_doctor_id' => $bookingData['doctorId']]);

        $flutterwave = new Flutterwave(config('services.flutterwave.secretKey'));

        $payload = [
            'tx_ref' => uniqid(),
            'amount' => $bookingData['amount'],
            'currency' => 'USD',
            'redirect_url' => route('flutterwave.callback'),
            'customer' => [
                'email' => $bookingData['email'],
                'name' => $bookingData['name'],
            ],
        ];

        $response = $flutterwave->payments()->create($payload);

        if ($response['status'] === 'success') {
            return redirect($response['data']['link']);
        }
    }

    public function paymentSuccess(Request $request)
    {
        $sessionId = $request->get('session_id');

        if (! $sessionId) {
            return redirect()->route('booking.cancel');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = StripeSession::retrieve($sessionId);

            if ($session->payment_status !== 'paid') {
                return redirect()->route('booking.cancel');
            }

            $bookingId = $session->metadata->booking_id;
            $appointment = $this->appointments->find($bookingId);

            session()->forget('pending_booking_doctor_id');

            $this->appointments->update($bookingId, [
                'status' => 'confirmed',
                'paymentStatus' => 'completed',
                'paymentMethod' => 'Stripe',
                'paymentIntentId' => $session->payment_intent,
                'stripeSessionId' => $session->id,
                'paymentCompletedAt' => now(),
            ]);

            $firestore = app(FirestoreService::class);

            // Notify patient
            $patient = $firestore->find('patients', $appointment['patientId'] ?? '');
            $patientEmail = $patient['email'] ?? null;
            if ($patientEmail) {
                try {
                    Mail::to($patientEmail)->send(new NewAppointmentBooked($appointment));
                } catch (\Throwable $e) {
                    Log::error('new-appointment-patient-email-failed', [
                        'appointment' => $bookingId,
                        'email' => $patientEmail,
                        'error' => $e->getMessage(),
                    ]);
                }
            }

            // Notify doctor
            $doctor = $firestore->find('doctors', $appointment['doctorId'] ?? '');
            $doctorEmail = $doctor['email'] ?? null;
            if ($doctorEmail) {
                try {
                    Mail::to($doctorEmail)->send(new NewAppointmentNotification($appointment));
                } catch (\Throwable $e) {
                    Log::error('new-appointment-doctor-email-failed', [
                        'appointment' => $bookingId,
                        'email' => $doctorEmail,
                        'error' => $e->getMessage(),
                    ]);
                }
            }

            return view('booking-success', ['booking_id' => $bookingId, 'appointment' => $appointment]);

        } catch (\Exception $e) {
            return redirect()->route('booking.cancel');
        }
    }

    public function paymentCancel()
    {
        $doctorId = session('pending_booking_doctor_id');
        session()->forget('pending_booking_doctor_id');

        if ($doctorId) {
            return redirect()
                ->route('booking', ['id' => $doctorId])
                ->with('error', 'Payment was cancelled. Please review your details and try again.');
        }

        return redirect()->route('doctors')->with('error', 'Payment was cancelled.');
    }

    public function flutterwaveCallback(Request $request)
    {
        $transactionId = $request->query('transaction_id');

        $flutterwave = new Flutterwave(config('services.flutterwave.secretKey'));

        $transaction = $flutterwave->transactions()->verify($transactionId);

        if ($transaction['status'] === 'success') {
            return redirect()->route('booking.success');
        }

        return redirect()->route('booking.cancel');
    }
}
