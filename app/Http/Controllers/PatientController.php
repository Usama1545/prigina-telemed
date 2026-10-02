<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\OpensAppointmentCalls;
use App\Mail\AppointmentCancelled;
use App\Exceptions\SlotUnavailableException;
use App\Services\DoctorAvailabilityService;
use App\Services\FirebaseAuthService;
use App\Services\FirestoreService;
use App\Support\AppointmentTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Contract\Storage;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class PatientController extends Controller
{
    use OpensAppointmentCalls;

    protected $firestore;

    protected $availabilityService;

    public function __construct(FirestoreService $firestore, DoctorAvailabilityService $availabilityService)
    {
        $this->firestore = $firestore;
        $this->availabilityService = $availabilityService;
    }

    public function dashboard(Request $request)
    {
        $firestore = $this->firestore;
        $uid = current_user()['uid'];
        $cursor = $request->query('cursor');

        if ($cursor) {
            $cursor = json_decode($cursor, true);
        }

        $futureAppointments = $this->firestore
            ->query('appointments', [
                ['field' => 'patientId', 'op' => '=', 'value' => $uid],
                ['field' => 'status', 'op' => '=', 'value' => 'confirmed'],
            ])['documents'] ?? [];

        $pastAppointments = $this->firestore
            ->query('appointments', [
                ['field' => 'patientId', 'op' => '=', 'value' => $uid],
                ['field' => 'status', 'op' => '=', 'value' => 'completed'],
            ])['documents'] ?? [];

        $tips = Cache::remember('patient.dashboard.tips', 6000, function () use ($firestore) {
            $result = $firestore->query('tips', [], null, null, 'createdAt', 'DESC');

            return collect($result['documents'] ?? [])->values();
        });

        $categories = Cache::remember('patient.dashboard.categories', 6000, function () use ($firestore) {
            $result = $firestore->query('categories', [
                [
                    'field' => 'isActive',
                    'op' => '=',
                    'value' => true,
                ],
            ]);

            return collect($result['documents'] ?? [])->values();
        });

        $doctors = Cache::remember('home.doctors', 3000, function () use ($firestore) {
            $result = $firestore->query('doctors', [
                [
                    'field' => 'isActive',
                    'op' => '=',
                    'value' => true,
                ],
                [
                    'field' => 'isTopDoctor',
                    'op' => '=',
                    'value' => true,
                ],
            ], 10);

            return collect($result['documents'] ?? [])->values();
        });

        return view('patient.dashboard', compact('pastAppointments', 'futureAppointments', 'categories', 'doctors', 'tips'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
            'email' => 'sometimes|required|email|max:255',
            'gender' => 'nullable|in:male,female,other',
            'dob' => 'nullable|date',
            'age' => 'nullable|integer|min:0|max:150',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'bloodGroup' => 'nullable|string|max:10',
            'height' => 'nullable|string|max:20',
            'weight' => 'nullable|string|max:20',
            'allergies' => 'nullable|string|max:1000',
            'medicalConditions' => 'nullable|string|max:1000',
            'timezone' => 'nullable|string|max:100',
        ]);

        $uid = current_user()['uid'];

        $data = collect($validated)->only([
            'name',
            'phone',
            'email',
            'gender',
            'dob',
            'age',
            'bloodGroup',
            'height',
            'weight',
            'allergies',
            'medicalConditions',
            'timezone',
        ])->toArray();

        if (! empty($data['dob'])) {
            // Keep age in sync with dob whenever dob is provided, rather than
            // trusting a separately-typed value that can drift out of date.
            $data['age'] = Carbon::parse($data['dob'])->age;

            $data['dob'] = Carbon::parse($data['dob'])
                ->startOfDay()
                ->toISOString();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time().'_'.$image->getClientOriginalName();
            $filePath = "profile_pictures/patients/{$uid}/{$fileName}";

            /** @var Storage $storage */
            $storage = app('firebase.storage');
            $bucket = $storage->getBucket();

            $bucket->upload(
                fopen($image->getRealPath(), 'r'),
                [
                    'name' => $filePath,
                    'predefinedAcl' => 'publicRead',
                ]
            );

            $data['photoUrl'] = 'https://storage.googleapis.com/'.$bucket->name().'/'.$filePath;
        }

        $this->firestore->update('patients', $uid, $data);

        return redirect()->back()->with('success', __('app.flash.profile_updated'));
    }

    public function appointments(Request $request)
    {
        $uid = current_user()['uid'];
        $direction = $request->query('direction', 'next');
        $cursor = $request->query('cursor');

        if ($cursor) {
            $cursor = json_decode($cursor, true);
        }

        // Reset session on fresh load
        if (! $request->has('cursor') && $direction !== 'prev') {
            session()->forget('appointment_cursors');
            session()->put('appointment_direction', 'next');
        }

        // Store current cursor before query
        if ($direction === 'next' && $cursor) {
            $cursors = session()->get('appointment_cursors', []);
            $cursors[] = $cursor;
            session()->put('appointment_cursors', $cursors);
            session()->put('appointment_direction', 'next');
        }

        // Handle previous navigation
        if ($direction === 'prev') {
            $cursors = session()->get('appointment_cursors', []);

            // Remove last cursor (current page)
            array_pop($cursors);

            // Get previous cursor
            $cursor = ! empty($cursors) ? end($cursors) : null;

            // Update session
            session()->put('appointment_cursors', $cursors);
            session()->put('appointment_direction', 'prev');
        }

        // Query Firestore
        $result = $this->firestore->query('appointments', [
            ['field' => 'patientId', 'op' => '=', 'value' => $uid],
        ], 50, $cursor, 'createdAt', 'DESC');

        $appointments = $result['documents'] ?? [];
        $nextCursor = $result['nextCursor'] ?? null;
        $hasMore = $result['hasMore'] ?? false;

        // For previous navigation
        $cursors = session()->get('appointment_cursors', []);
        $hasPrev = ($direction === 'prev') ? ! empty($cursors) : count($cursors) > 1;

        $grouped = [
            'upcoming' => [],
            'pending' => [],
            'cancelled' => [],
            'completed' => [],
        ];

        foreach ($appointments as $appointment) {
            $status = $appointment['status'] ?? null;

            if ($status === 'confirmed') {
                $grouped['upcoming'][] = $appointment;
            } elseif ($status === 'pending') {
                $grouped['pending'][] = $appointment;
            } elseif ($status === 'cancelled') {
                $grouped['cancelled'][] = $appointment;
            } elseif ($status === 'completed') {
                $grouped['completed'][] = $appointment;
            }
        }

        return view('patient.appointments', [
            'appointments' => $grouped,
            'nextCursor' => $nextCursor,
            'hasMore' => $hasMore,
            'hasPrev' => $hasPrev,
        ]);
    }

    public function profile(Request $request)
    {
        $uid = current_user()['uid'];
        $patient = $this->firestore->find('patients', $uid);

        return view('patient.profile-settings', compact('patient'));
    }

    public function changePassword(Request $request, Auth $auth)
    {

        $email = current_user()['email'];
        $uid = current_user()['uid'];

        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $response = Http::post(
            'https://identitytoolkit.googleapis.com/v1/accounts:signInWithPassword?key='.config('services.firebase.api_key'),
            [
                'email' => $email,
                'password' => $request->current_password,
                'returnSecureToken' => true,
            ]
        );

        if ($response->failed()) {
            return back()->withErrors([
                'current_password' => 'Current password is incorrect',
            ]);
        }

        $updatedUser = $auth->updateUser($uid, [
            'password' => $request->password,
        ]);

        // Debug (temporary)
        if (! $updatedUser) {
            dd(__('app.flash.password_update_failed'));

            return back()->withErrors(['password' => __('app.flash.password_update_failed')]);
        }

        return redirect()->back()->with('success', __('app.flash.password_updated'));

    }

    public function deleteAccount(Request $request, FirebaseAuthService $authService)
    {
        $uid = current_user()['uid'];

        $authService->disableUser($uid);
        $authService->revokeRefreshTokens($uid);

        // Only the auth account is disabled here — the Firestore patient
        // document is intentionally left in place, just flagged inactive.
        $this->firestore->update('patients', $uid, [
            'isActive' => false,
            'accountDeleted' => true,
            'deletedAt' => now()->toDateTimeString(),
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', __('app.flash.account_deleted'));
    }

    public function conversations()
    {
        $uid = current_user()['uid'];

        $filteredConversations = $this->firestore->query('conversations', [
            ['field' => 'patientId', 'op' => '=', 'value' => $uid],
        ], null, null, 'lastMessageTime', 'DESC');

        // Only show conversations where a paid/confirmed appointment exists with that doctor
        $doctorsWithAppointments = chat_eligible_user_ids($uid, 'patient');

        $conversations = collect($filteredConversations['documents'] ?? [])
            ->filter(fn ($conv) => isset($doctorsWithAppointments[$conv['doctorId'] ?? '']))
            ->filter(fn ($conv) => ! ($conv['deletedByPatient'] ?? false))
            ->map(fn ($conversation) => $this->normalizeConversation($conversation))
            ->values()
            ->all();

        return view('patient.chat', compact('conversations'));
    }

    public function messages(Request $request, $id)
    {
        $limit = min(max((int) $request->query('limit', 30), 1), 50);
        $page = max((int) $request->query('page', 1), 1);
        $offset = ($page - 1) * $limit;

        $currentUserId = current_user()['uid'];

        // conversation lookup
        $conversation = $this->firestore->find('conversations', $id);

        if (! $conversation) {
            return response()->json([
                'messages' => [],
                'nextPage' => null,
                'hasMore' => false,
            ]);
        }

        if (! in_array($currentUserId, [$conversation['patientId'] ?? null, $conversation['doctorId'] ?? null], true)) {
            abort(403);
        }

        $otherUserId =
            $conversation['doctorId'] === $currentUserId
                ? $conversation['patientId']
                : $conversation['doctorId'];

        // =========================
        // Messages
        // =========================

        $rawMessages = $this->firestore->queryOffset(
            'messages',
            [
                [
                    'field' => 'conversationId',
                    'op' => '=',
                    'value' => $id,
                ],
            ],
            $limit + 1,
            $offset,
            'timestamp',
            'DESC'
        );

        $hasMore = count($rawMessages) > $limit;

        $rawMessages = array_slice($rawMessages, 0, $limit);

        $messages = array_map(function ($msg) {

            $msg['type'] = 'message';

            $msg['sortTime'] =
                $msg['timestamp']
                ?? now()->toIso8601String();

            return $msg;

        }, array_reverse($rawMessages));

        // =========================
        // Calls made by current user
        // =========================

        $outgoingCalls = $this->firestore->query(
            'calls',
            [
                [
                    'field' => 'callerId',
                    'op' => '=',
                    'value' => $currentUserId,
                ],
                [
                    'field' => 'receiverId',
                    'op' => '=',
                    'value' => $otherUserId,
                ],
            ],
            null,
            null,
            'startTime',
            'DESC'
        );

        // =========================
        // Calls received by current user
        // =========================

        $incomingCalls = $this->firestore->query(
            'calls',
            [
                [
                    'field' => 'callerId',
                    'op' => '=',
                    'value' => $otherUserId,
                ],
                [
                    'field' => 'receiverId',
                    'op' => '=',
                    'value' => $currentUserId,
                ],
            ],
            null,
            null,
            'startTime',
            'DESC'
        );

        // =========================
        // Merge calls
        // =========================

        $allCalls = array_merge(
            $outgoingCalls['documents'] ?? [],
            $incomingCalls['documents'] ?? []
        );

        $calls = array_map(function ($call) {

            $call['type'] = 'call';

            $ts =
                $call['startTime']
                ?? $call['createdAt']
                ?? now()->toIso8601String();

            $call['timestamp'] = $ts;

            $call['sortTime'] = $ts;

            return $call;

        }, $allCalls);

        // =========================
        // Final timeline
        // =========================

        $timeline = array_merge(
            $messages,
            $calls
        );

        usort($timeline, function ($a, $b) {

            return strcmp(
                $a['sortTime'],
                $b['sortTime']
            );

        });

        return response()->json([
            'messages' => array_values($timeline),
            'nextPage' => $hasMore ? $page + 1 : null,
            'hasMore' => $hasMore,
        ]);
    }

    public function sendMessage(Request $request, $id)
    {
        $validated = $request->validate([
            'text' => 'required_without:file|string',
            'type' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf,doc,docx,txt|max:5048',
        ]);
        $conversation = $this->firestore->find('conversations', $id);

        $uid = current_user()['uid'];

        if (! $conversation || ($conversation['patientId'] ?? null) !== $uid) {
            abort(404);
        }

        if (! can_chat($uid, $conversation['doctorId'] ?? '')) {
            abort(403, 'You must have an appointment with this doctor before starting a chat.');
        }

        $data = [
            'conversationId' => $id,
            'senderId' => $uid,
            'receiverId' => $conversation['doctorId'],
            'timestamp' => now(),
            'type' => 'text',
            'text' => $request->text ?? '',
            'imageUrl' => null,
            'documentUrl' => null,
            'isRead' => false,
        ];

        // HANDLE FILE
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time().'_'.$file->getClientOriginalName();

            $filePath = "/chat_images/{$id}/{$fileName}";

            /** @var Storage $storage */
            $storage = app('firebase.storage');
            $bucket = $storage->getBucket();

            $bucket->upload(
                fopen($file->getRealPath(), 'r'),
                [
                    'name' => $filePath,
                    'predefinedAcl' => 'publicRead',
                ]
            );

            $imageUrl = 'https://storage.googleapis.com/'.$bucket->name().'/'.$filePath;

            if (str_contains($file->getMimeType(), 'image')) {
                $data['imageUrl'] = $imageUrl;
                $data['type'] = 'image';
                $data['text'] = '📷 Photo';
            } else {
                $data['documentUrl'] = $imageUrl;
                $data['type'] = 'document';
                $data['text'] = '📄 Document';
            }
        }

        // SAVE TO FIRESTORE
        $this->firestore->update('conversations', $id, [
            'lastMessage' => $data['text'],
            'lastMessageSender' => $uid,
            'lastMessageTime' => now(),
            'doctorUnreadCount' => ((int) ($conversation['doctorUnreadCount'] ?? 0)) + 1,
            'updatedAt' => now(),
        ]);

        $this->firestore->create('messages', $data);

        return response()->json([
            'success' => true,
            'message' => $data,
        ]);
    }

    public function cancelAppointment($id)
    {
        $appointment = $this->firestore->find('appointments', $id);

        if (! $appointment) {
            return redirect()->back()->with('error', __('app.flash.appointment_not_found'));
        }

        // Block cancellation within 24 hours of the appointment
        $apptStart = AppointmentTime::startUtc($appointment);
        if ($apptStart && $apptStart->lte(now()->addHours(24))) {
            return redirect()->back()->with('error', __('app.flash.cannot_cancel_24h'));
        }

        $this->firestore->update('appointments', $id, [
            'status' => 'cancelled',
            'cancelledAt' => now()->toDateTimeString(),
            'updatedAt' => now()->toDateTimeString(),
        ]);

        // Send cancellation + refund email
        $email = $appointment['patientEmail'] ?? null;
        if ($email) {
            try {
                Mail::to($email)->send(new AppointmentCancelled($appointment));
            } catch (\Throwable $e) {
                Log::error('appointment-cancellation-email-failed', [
                    'appointment' => $id,
                    'email' => $email,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return redirect()->back()->with('success', __('app.flash.appointment_cancelled'));
    }

    public function deleteAppointment($id)
    {
        $appointment = $this->firestore->find('appointments', $id);

        if (! $appointment || ($appointment['patientId'] ?? '') !== current_user()['uid']) {
            return redirect()->back()->with('error', __('app.flash.appointment_not_found'));
        }

        $this->firestore->delete('appointments', $id);

        return redirect()->back()->with('success', __('app.flash.appointment_deleted'));
    }

    public function rescheduleAppointment(Request $request, $id)
    {
        $validated = $request->validate([
            // The new slot's UTC start instant, as returned by the available-slots endpoint.
            'slot' => 'required|string',
        ]);

        $appointment = $this->firestore->find('appointments', $id);

        if (! $appointment || ($appointment['patientId'] ?? '') !== current_user()['uid']) {
            return response()->json(['success' => false, 'message' => __('app.flash.appointment_not_found')], 404);
        }

        if (($appointment['status'] ?? '') !== 'confirmed') {
            return response()->json(['success' => false, 'message' => __('app.flash.only_confirmed_reschedule')], 422);
        }

        // Block rescheduling within 24 hours of the appointment
        $apptStart = AppointmentTime::startUtc($appointment);
        if ($apptStart && $apptStart->lte(now()->addHours(24))) {
            return response()->json(['success' => false, 'message' => __('app.flash.cannot_reschedule_24h')], 422);
        }

        $newStart = AppointmentTime::toUtc($validated['slot']);

        // The service recomputes the doctor's real availability (ignoring this
        // appointment's own slot) and reserves the new slot in a transaction.
        // Reschedule emails (patient + doctor) are sent by the Firestore
        // onAppointmentStatusChanged Cloud Function when startTimeUTC changes.
        try {
            if (! $newStart) {
                throw new SlotUnavailableException;
            }
            $fields = $this->availabilityService->reschedule($id, $appointment, $newStart);
        } catch (SlotUnavailableException) {
            return response()->json(['success' => false, 'message' => __('app.flash.slot_unavailable_choose_another')], 422);
        }

        $local = AppointmentTime::forViewer($fields, current_user()['timezone'] ?? null);

        return response()->json([
            'success' => true,
            'formattedDate' => $local['date'],
            'startTime' => AppointmentTime::clock($local['start']),
            'endTime' => AppointmentTime::clock($local['end']),
        ]);
    }

    public function initiatePayment($id)
    {
        $appointment = $this->firestore->find('appointments', $id);

        if (! $appointment || ($appointment['patientId'] ?? '') !== current_user()['uid']) {
            return redirect()->back()->with('error', __('app.flash.appointment_not_found'));
        }

        if (($appointment['paymentStatus'] ?? '') === 'completed') {
            return redirect()->back()->with('error', __('app.flash.already_paid'));
        }

        // An unpaid booking only holds its slot for 30 minutes: take it back (and
        // restart the hold) unless someone else has booked it or it has passed.
        try {
            $this->availabilityService->reclaim($id, $appointment);
        } catch (SlotUnavailableException) {
            return redirect()->back()->with('error', __('app.flash.slot_unavailable_book_new'));
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $consultationFee = (float) ($appointment['amount'] ?? 0);
        $stripeFee = round($consultationFee * (BookingController::STRIPE_FEE_PERCENT / 100), 2);

        $lineItems = [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Doctor Consultation',
                    'description' => 'Appointment with Dr. '.$appointment['doctorName'],
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
                        'description' => BookingController::STRIPE_FEE_PERCENT.'% card processing fee',
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
            // The slot is only held for 30 minutes; Stripe's minimum session length is 30
            // minutes, plus a minute so server clock skew can't make Stripe reject it.
            'expires_at' => time() + 31 * 60,
            'success_url' => route('booking.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('patient.appointments'),
            'metadata' => [
                'booking_id' => $appointment['id'],
            ],
        ]);

        return redirect($checkoutSession->url);
    }

    public function appointmentDetails($id)
    {
        $appointment = $this->firestore->find('appointments', $id);

        // Patients may only see their own appointments.
        if (! $appointment || ($appointment['patientId'] ?? null) !== (current_user()['uid'] ?? null)) {
            return response()->json(['success' => false, 'message' => __('app.flash.appointment_not_found')], 404);
        }

        if ($appointment) {
            $when = appointment_when($appointment);
            $appointment['displayDate'] = $when['date'];
            $appointment['displayTime'] = $when['label'];
        }

        return response()->json($appointment);
    }

    public function appointmentInvoice($id)
    {
        $appointment = $this->firestore->find('appointments', $id);

        if (! $appointment) {
            abort(404);
        }

        return view('patient.invoice', compact('appointment'));
    }

    public function zegoToken()
    {
        $user = current_user();

        if (! $user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        return response()->json([
            'token' => generateZegoToken($user['uid']),
            'userID' => $user['uid'],
            'userName' => $user['name'] ?: 'User',
            'appID' => (int) config('services.zego.app_id'),
        ]);
    }

    public function audioCall($id)
    {
        return $this->openCallPage($id, null, 'audio', route('patient.conversations.show', $id));
    }

    public function videoCall($id)
    {
        return $this->openCallPage($id, null, 'video', route('patient.conversations.show', $id));
    }

    public function appointmentVideoCall($appointmentId)
    {
        return $this->openCallPage(null, $appointmentId, 'video', route('patient.appointments'));
    }

    public function appointmentAudioCall($appointmentId)
    {
        return $this->openCallPage(null, $appointmentId, 'audio', route('patient.appointments'));
    }

    public function createConversation($id)
    {
        $doctor = $this->firestore->find('doctors', $id);
        $patient = current_user();

        if (! $doctor) {
            abort(404);
        }

        if (! $patient) {
            abort(403);
        }

        // Block conversation creation unless a paid/confirmed appointment exists with this doctor
        if (! can_chat($patient['uid'], $doctor['uid'])) {
            abort(403, 'You must have an appointment with this doctor before starting a chat.');
        }

        $converastion = $this->firestore->query('conversations', [
            ['field' => 'patientId', 'op' => '=', 'value' => $patient['uid']],
            ['field' => 'doctorId', 'op' => '=', 'value' => $doctor['uid']],
        ], null, null, 'createdAt', 'DESC');
        if (! empty($converastion['documents'])) {
            return redirect()->route('patient.conversations');
        }
        $docID = Str::random(60);

        $this->firestore->createWithId('conversations', $docID, [
            'doctorId' => $doctor['uid'],
            'doctorName' => $doctor['name'] ?? '',
            'doctorSpecialty' => $doctor['specializations'][0] ?? '',
            'patientId' => $patient['uid'],
            'patientName' => $patient['name'] ?? '',
            'patientAge' => $patient['dob'] ?? '',
            'patientGender' => $patient['gender'] ?? '',
            'doctorUnreadCount' => 0,
            'patientUnreadCount' => 0,
            'unreadCount' => 0,
            'lastMessage' => '',
            'lastMessageSender' => '',
            'lastMessageTime' => null,
            'lastReadByDoctor' => null,
            'lastReadByPatient' => null,
            'deletedByPatient' => false,
            'deletedByDoctor' => false,
            'createdAt' => now(),
            'updatedAt' => now(),
        ]);

        return redirect()->route('patient.conversations');
    }

    public function markRead($id)
    {
        $this->firestore->update('conversations', $id, [
            'patientUnreadCount' => 0,
            'lastReadByPatient' => now(),
        ]);

        $messages = $this->firestore->query('messages', [
            ['field' => 'conversationId', 'op' => '=', 'value' => $id],
            ['field' => 'receiverId', 'op' => '=', 'value' => current_user()['uid']],
        ], null, null, 'timestamp', 'ASC');

        foreach ($messages['documents'] as $message) {

            $this->firestore->update('messages', $message['id'], [
                'isRead' => true,
            ]);
        }

        return true;
    }

    public function deleteConversation($id)
    {
        $uid = current_user()['uid'];
        $conversation = $this->firestore->find('conversations', $id);

        if (! $conversation || ($conversation['patientId'] ?? '') !== $uid) {
            return response()->json(['success' => false], 404);
        }

        $this->firestore->update('conversations', $id, ['deletedByPatient' => true]);

        if ($conversation['deletedByDoctor'] ?? false) {
            $this->firestore->permanentlyDeleteConversation($id);
        }

        return response()->json(['success' => true]);
    }

    private function normalizeConversation(array $conversation): array
    {
        return array_merge([
            'doctorName' => '',
            'doctorSpecialty' => '',
            'patientName' => '',
            'patientAge' => '',
            'patientGender' => '',
            'doctorUnreadCount' => 0,
            'patientUnreadCount' => 0,
            'unreadCount' => 0,
            'lastMessage' => '',
            'lastMessageSender' => '',
            'lastMessageTime' => null,
            'lastReadByDoctor' => null,
            'lastReadByPatient' => null,
        ], $conversation);
    }

    public function agreeToConsent()
    {
        $uid = current_user()['uid'];
        $this->firestore->update('patients', $uid, [
            'consentAgreed' => true,
            'consentAgreedAt' => now(),
        ]);

        return redirect()->route('patient.conversations');
    }
}
