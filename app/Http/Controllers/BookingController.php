<?php

namespace App\Http\Controllers;

use App\Models\Firestore\Appointment;
use App\Models\Firestore\AppSetting;
use App\Models\Firestore\Doctor;
use App\Services\FirestoreService;
use Carbon\Carbon;
use Flutterwave\Flutterwave;
use Illuminate\Http\Request;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class BookingController extends Controller
{
    protected $doctors;

    protected $appSetting;

    protected $appointments;

    public function __construct(Doctor $doctors, AppSetting $appSetting, Appointment $appointments)
    {
        $this->doctors = $doctors;
        $this->appSetting = $appSetting;
        $this->appointments = $appointments;
    }

    public function BookingSlots($id)
    {
        $doctor = $this->doctors->find($id);
        $setting = $this->appSetting->first();

        $baseFilter = [
            [
                'field' => 'doctorId',
                'op' => '=',
                'value' => $id,
            ],
        ];

        $firestore = app(FirestoreService::class);

        $bookedSlots = $firestore->query('appointments', $baseFilter);

        $breaks = $doctor['breaks'] ?? [];
        $workingDays = $doctor['workingDays'] ?? [];
        $workingHours = $doctor['workingHours'] ?? [];
        $slotDuration = $setting['slotDuration'] ?? 30;

        $bookedMap = [];

        foreach ($bookedSlots['documents'] ?? [] as $appointment) {
            $date = date('Y-m-d', strtotime($appointment['date']));
            $start = date('H:i', strtotime($appointment['startTime']));

            $bookedMap[$date][] = $start;
        }
        $weekDays = [];

        $today = now();

        for ($i = 0; $i < 7; $i++) {
            $day = $today->copy()->addDays($i);

            if (in_array($day->format('l'), $workingDays)) {
                $weekDays[] = $day->format('Y-m-d');
            }
        }

        $slots = [];

        $startTime = $workingHours[0]; // "09:00"
        $endTime = $workingHours[1];   // "17:00"

        foreach ($weekDays as $date) {

            $current = strtotime($startTime);
            $end = strtotime($endTime);

            while ($current < $end) {

                $slot = date('H:i', $current);

                if (isset($bookedMap[$date]) && in_array($slot, $bookedMap[$date])) {
                    $current += $slotDuration * 60;

                    continue;
                }

                if (! empty($breaks)) {
                    if (count($breaks) === 1) {
                        $breaks = explode('-', $breaks[0]);
                    }
                    $breakStart = strtotime($breaks[0]);
                    $breakEnd = strtotime($breaks[1]);

                    if ($current >= $breakStart && $current < $breakEnd) {
                        $current += $slotDuration * 60;

                        continue;
                    }
                }

                $slots[$date][] = $slot;

                $current += $slotDuration * 60;
            }
        }

        $availability = [];

        foreach ($slots as $date => $daySlots) {
            $availability[] = [
                'date' => $date,
                'day' => date('l', strtotime($date)),
                'slots' => $daySlots,
            ];
        }

        $title = 'Select Available Slots';

        return view('booking', compact('doctor', 'slots', 'title', 'availability'));

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
            'amount' => 'required|numeric',
            'payment_gateway' => 'required|in:stripe,flutterwave',
            'symptoms' => 'nullable|string',
            'files' => 'nullable|array',
            'problem' => 'nullable|string',
        ]);

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

        // Create DateTime objects for start and end times with the selected date
        $startDateTime = Carbon::parse($validated['selected_date'].' '.date('H:i:s', $startTime), $doctor['timezone'] ?? 'UTC');
        $endDateTime = Carbon::parse($validated['selected_date'].' '.date('H:i:s', $endTime), $doctor['timezone'] ?? 'UTC');
        $documentId = uniqid();

        // Convert to UTC for storage
        $startTimeUTC = $startDateTime->copy()->setTimezone('UTC');
        $endTimeUTC = $endDateTime->copy()->setTimezone('UTC');
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
            'amount' => (float) $validated['amount'],
            'paymentMethod' => $validated['payment_gateway'] === 'stripe' ? 'Debit Card' : 'Flutterwave',
            'symptoms' => $validated['symptoms'],
            'notes' => $validated['problem'],
            'status' => 'pending',
            'patientLocalTime' => $startTimeFormatted.' - '.$endTimeFormatted,
            'doctorLocalTime' => $startDateTime->format('h:i A').' - '.$endDateTime->format('h:i A'),
            'createdAt' => now(),
            'updatedAt' => now(),
        ];
        $firestore = app(FirestoreService::class);

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
        Stripe::setApiKey(config('services.stripe.secret'));

        $checkoutSession = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Doctor Consultation',
                        'description' => 'Appointment with Dr. '.$bookingData['doctorName'],
                    ],
                    'unit_amount' => $bookingData['amount'] * 100, // Stripe uses cents
                ],
                'quantity' => 1,
            ]],
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

            $this->appointments->update($bookingId, [
                'status' => 'confirmed',
                'paymentStatus' => 'completed',
                'paymentMethod' => 'Stripe',
                'paymentIntentId' => $session->payment_intent,
                'stripeSessionId' => $session->id,
                'paymentCompletedAt' => now(),
            ]);

            return view('booking-success', ['booking_id' => $bookingId, 'appointment' => $appointment]);

        } catch (\Exception $e) {
            return redirect()->route('booking.cancel');
        }
    }

    public function paymentCancel()
    {
        return redirect()->route('booking')->with('error', 'Payment was cancelled');
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
