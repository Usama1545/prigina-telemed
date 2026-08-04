<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentCompleted;
use App\Mail\AppointmentConfirmed;
use App\Mail\AppointmentRejected;
use App\Services\DoctorAvailabilityService;
use App\Services\FirebaseAuthService;
use App\Services\FirestoreService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Contract\Storage;
use Stripe\Account;
use Stripe\AccountLink;
use Stripe\Stripe;
use Symfony\Component\Intl\Countries;

class DoctorProfileController extends Controller
{
    protected $firestore;

    protected $availabilityService;

    public function __construct(FirestoreService $firestore, DoctorAvailabilityService $availabilityService)
    {
        $this->firestore = $firestore;
        $this->availabilityService = $availabilityService;
    }

    public function dashboard(Request $request)
    {
        $uid = current_user()['uid'];

        $appointments = app(FirestoreService::class)
            ->query('appointments', [
                ['field' => 'doctorId', 'op' => '=', 'value' => $uid],
            ])['documents'] ?? [];

        $appointments = collect($appointments)->map(function ($appointment) {

            try {

                $date = preg_replace('/\s+/', ' ', $appointment['date']);

                $appointment['parsed_date'] = Carbon::parse($date);

            } catch (\Exception $e) {

                $appointment['parsed_date'] = null;
            }

            return $appointment;
        });

        $pastAppointments = $appointments->filter(function ($appointment) {
            return ($appointment['status'] ?? null) === 'completed';
        });

        $futureAppointments = $appointments->filter(function ($appointment) {
            return ($appointment['status'] ?? null) === 'confirmed';
        });

        $waitingAppointments = $appointments->filter(function ($appointment) {

            return in_array(
                $appointment['status'] ?? null,
                ['pending', 'confirmed']
            );
        });

        $todayAppointments = $futureAppointments->filter(function ($appointment) {

            return $appointment['parsed_date']
                ? $appointment['parsed_date']->isToday()
                : false;
        });

        $revenueRecords = app(FirestoreService::class)
            ->query('doctor_revenue', [
                ['field' => 'doctorId', 'op' => '=', 'value' => $uid],
                ['field' => 'status', 'op' => '=', 'value' => 'paid'],
            ], null, null, 'createdAt', 'DESC')['documents'] ?? [];

        $totalEarnings = collect($revenueRecords)->sum(function ($record) {
            return ($record['netAmount'] ?? 0) / 100;
        });

        $notifications = app(FirestoreService::class)
            ->query('notifications', [
                ['field' => 'userId', 'op' => '=', 'value' => $uid],
            ], null, null, 'createdAt', 'DESC')['documents'] ?? [];

        return view('doctor.dashboard', [
            'appointments' => $appointments,
            'pastAppointments' => $pastAppointments,
            'futureAppointments' => $futureAppointments,
            'waitingAppointments' => $waitingAppointments->count(),
            'todayAppointments' => $todayAppointments,
            'totalEarnings' => $totalEarnings,
            'notifications' => $notifications,
        ]);
    }

    public function update(Request $request)
    {

        // ✅ Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'licenseNumber' => 'required',
            'qualification' => 'required|array|min:1',
            'experience' => 'required|string',
            'specializations' => 'required|array|min:1',
            'languages' => 'required|array|min:1',
            'practiceCountry' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'consultationFee' => 'required|numeric',
            'workingDays' => 'required|array',
            'workingHours' => 'required|array',
            'breaks' => 'nullable|string',
            'slotDuration' => 'required|numeric',
            'timezone' => 'required|string',
            'bio' => 'nullable|array',
            'bio.en' => 'nullable|string',
            'bio.es' => 'nullable|string',
            'bio.fr' => 'nullable|string',
            'bio.ar' => 'nullable|string',
        ]);

        $uid = current_user()['uid'];

        $data = collect($validated)->only([
            'name',
            'phone',
            'email',
            'gender',
            'dob',
            'licenseNumber',
            'qualification',
            'experience',
            'specializations',
            'practiceCountry',
            'consultationFee',
            'workingDays',
            'workingHours',
            'slotDuration',
            'timezone',
        ])->toArray();

        $bioInput = $validated['bio'] ?? [];

        $data['bio'] = [
            'en' => $bioInput['en'] ?? '',
            'es' => $bioInput['es'] ?? '',
            'fr' => $bioInput['fr'] ?? '',
            'ar' => $bioInput['ar'] ?? '',
        ];

        // ✅ Handle Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time().'_'.$image->getClientOriginalName();

            $filePath = "profile_pictures/doctor_profiles/{$uid}/{$fileName}";

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

            $imageUrl = 'https://storage.googleapis.com/'.$bucket->name().'/'.$filePath;

            $data['profilePicture'] = $imageUrl;
        }

        $breaks = [];

        if (! empty($validated['breaks'])) {
            $breaks = explode(',', $validated['breaks']);
        }

        $this->firestore->update('doctors', $uid, [
            ...$data,
            'languages' => $validated['languages'],
            'breaks' => $breaks,
            'consultationFee' => intval($validated['consultationFee']),
            'timezone' => $validated['timezone'],
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function appointments(Request $request)
    {
        $uid = current_user()['uid'];

        $cursor = $request->query('cursor');

        if ($cursor) {
            $cursor = json_decode($cursor, true);
        }

        $result = $this->firestore->query(
            'appointments',
            [
                [
                    'field' => 'doctorId',
                    'op' => '=',
                    'value' => $uid,
                ],
            ],
            20,
            $cursor,
            'createdAt',
            'DESC'
        );

        $appointments = $result['documents'] ?? [];

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

        return view('doctor.appointments', [
            'appointments' => $grouped,
            'nextCursor' => $result['nextCursor'] ?? null,
            'hasMore' => $result['hasMore'] ?? false,
        ]);
    }

    public function profile(Request $request)
    {
        $uid = current_user()['uid'];
        $doctor = $this->firestore->find('doctors', $uid);
        $specializations = $this->firestore->get('categories');
        $workingDays = current_user()['workingDays'] ?? [];
        $workingHours = current_user()['workingHours'] ?? [];
        $breaks = current_user()['breaks'] ?? [];
        $countries = Countries::getNames();

        return view('doctor.profile-settings', compact('doctor', 'specializations', 'workingDays', 'workingHours', 'breaks', 'countries'));
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
            dd('Password update failed');

            return back()->withErrors(['password' => 'Password update failed']);
        }

        return redirect()->back()->with('success', 'Password updated successfully.');

    }

    public function deleteAccount(Request $request, FirebaseAuthService $authService)
    {
        $uid = current_user()['uid'];

        $authService->disableUser($uid);
        $authService->revokeRefreshTokens($uid);

        // Only the auth account is disabled here — the Firestore doctor
        // document is intentionally left in place, just flagged inactive.
        $this->firestore->update('doctors', $uid, [
            'isActive' => false,
            'accountDeleted' => true,
            'deletedAt' => now()->toDateTimeString(),
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Your account has been deleted.');
    }

    public function conversations()
    {
        $uid = current_user()['uid'];

        $filteredConversations = $this->firestore->query('conversations', [
            ['field' => 'doctorId', 'op' => '=', 'value' => $uid],
        ], null, null, 'lastMessageTime', 'DESC');

        // Only show conversations where an appointment exists with that patient
        $appointments = $this->firestore->query('appointments', [
            ['field' => 'doctorId', 'op' => '=', 'value' => $uid],
        ]);

        $patientsWithAppointments = collect($appointments['documents'] ?? [])
            ->pluck('patientId')
            ->filter()
            ->unique()
            ->flip()
            ->toArray();

        $conversations = collect($filteredConversations['documents'] ?? [])
            ->filter(fn ($conv) => isset($patientsWithAppointments[$conv['patientId'] ?? '']))
            ->filter(fn ($conv) => ! ($conv['deletedByDoctor'] ?? false))
            ->map(fn ($conversation) => $this->normalizeConversation($conversation))
            ->values()
            ->all();

        return view('doctor.chat', compact('conversations'));
    }

    public function messages(Request $request, $id)
    {
        $limit = min(max((int) $request->query('limit', 30), 1), 50);
        $page = max((int) $request->query('page', 1), 1);
        $offset = ($page - 1) * $limit;

        $messages = $this->firestore->queryOffset('messages', [
            ['field' => 'conversationId', 'op' => '=', 'value' => $id],
        ], $limit + 1, $offset, 'timestamp', 'DESC');

        $hasMore = count($messages) > $limit;
        $messages = array_slice($messages, 0, $limit);
        $messages = array_reverse($messages);

        return response()->json([
            'messages' => $messages,
            'nextPage' => $hasMore ? $page + 1 : null,
            'hasMore' => $hasMore,
        ]);
    }

    public function sendMessage(Request $request, $id)
    {
        $validated = $request->validate([
            'text' => 'nullable|string',
            'type' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf,doc,docx,txt|max:5048',
        ]);
        $conversation = $this->firestore->find('conversations', $id);

        $uid = current_user()['uid'];

        $data = [
            'conversationId' => $id,
            'senderId' => $uid,
            'receiverId' => $conversation['patientId'],
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
        $this->firestore->update('conversations', $id, [
            'lastMessage' => $data['text'],
            'lastMessageSender' => current_user()['uid'] ?? '',
            'lastMessageTime' => now(),
            'patientUnreadCount' => ((int) ($conversation['patientUnreadCount'] ?? 0)) + 1,
            'updatedAt' => now(),
        ]);

        // SAVE TO FIRESTORE
        $this->firestore->create('messages', $data);

        return response()->json([
            'success' => true,
            'message' => $data,
        ]);
    }

    public function cancelAppointment($id)
    {
        $appointment = $this->firestore->find('appointments', $id);

        // Block cancellation within 24 hours of the appointment (only applies once
        // the booking is confirmed — a still-pending request can be declined anytime)
        if (($appointment['status'] ?? '') === 'confirmed' && ! empty($appointment['date'])) {
            $apptDate = Carbon::parse($appointment['date']);
            if ($apptDate->lte(now()->addHours(24))) {
                return redirect()->back()->with('error', 'Appointments cannot be cancelled within 24 hours of the scheduled time.');
            }
        }

        $this->firestore->update('appointments', $id, [
            'status' => 'cancelled',
            'rejectedAt' => now()->toDateTimeString(),
            'updatedAt' => now()->toDateTimeString(),
        ]);

        if ($appointment) {
            $patient = $this->firestore->find('patients', $appointment['patientId'] ?? '');
            $email = $patient['email'] ?? null;
            if ($email) {
                try {
                    Mail::to($email)->send(new AppointmentRejected($appointment));
                } catch (\Throwable $e) {
                    Log::error('appointment-rejected-email-failed', [
                        'appointment' => $id,
                        'email' => $email,
                        'error' => $e->getMessage(),
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Appointment cancelled successfully.');
    }

    public function deleteAppointment($id)
    {
        $appointment = $this->firestore->find('appointments', $id);

        if (! $appointment || ($appointment['doctorId'] ?? '') !== current_user()['uid']) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }

        $this->firestore->delete('appointments', $id);

        return redirect()->back()->with('success', 'Appointment deleted.');
    }

    public function appointmentDetails($id)
    {
        $appointment = $this->firestore->find('appointments', $id);

        return response()->json($appointment);
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
            'userName' => $user['name'] ?: 'Doctor',
            'appID' => (int) config('services.zego.app_id'),
        ]);
    }

    public function audioCall($id)
    {
        $conversation = $this->firestore->find('conversations', $id);
        if (! $conversation) {
            abort(404);
        }

        $user = current_user();
        if (! $user) {
            abort(403);
        }

        // Remote party for the doctor is the patient
        $patient = $this->firestore->find('patients', $conversation['patientId'] ?? '') ?? [];

        $token = generateZegoToken($user['uid']);
        Log::info('data', [
            'token' => $token,
            'patient' => $patient,   // shown as the remote party on the call screen
        ]);

        return view('patient.voice-call', [
            'id' => $id,
            'doctor' => $patient,   // shown as the remote party on the call screen
            'user' => $user,
            'token' => $token,
            'backUrl' => route('doctor.conversations'),
        ]);
    }

    public function videoCall($id)
    {
        $conversation = $this->firestore->find('conversations', $id);

        if (! $conversation) {
            abort(404);
        }

        $user = current_user();

        if (! $user) {
            abort(403);
        }

        // Remote party for the doctor is the patient
        $patient = $this->firestore->find('patients', $conversation['patientId'] ?? '') ?? [];

        $token = generateZegoToken($user['uid']);

        return view('patient.video-call', [
            'id' => $id,
            'doctor' => $patient,   // shown as the remote party on the call screen
            'user' => $user,
            'token' => $token,
            'backUrl' => route('doctor.conversations'),
        ]);
    }

    public function appointmentVideoCall($appointmentId)
    {
        $appointment = $this->firestore->find('appointments', $appointmentId);
        if (! $appointment) {
            abort(404);
        }

        $user = current_user();
        if (! $user) {
            abort(403);
        }

        $patientId = $appointment['patientId'] ?? null;
        if (! $patientId) {
            abort(404);
        }

        $patient = $this->firestore->find('patients', $patientId) ?? [];
        $token = generateZegoToken($user['uid']);

        return view('patient.video-call', [
            'id' => $appointmentId,
            'doctor' => $patient,
            'user' => $user,
            'token' => $token,
            'backUrl' => route('doctor.appointments'),
        ]);
    }

    public function appointmentAudioCall($appointmentId)
    {
        $appointment = $this->firestore->find('appointments', $appointmentId);
        if (! $appointment) {
            abort(404);
        }

        $user = current_user();
        if (! $user) {
            abort(403);
        }

        $patientId = $appointment['patientId'] ?? null;
        if (! $patientId) {
            abort(404);
        }

        $patient = $this->firestore->find('patients', $patientId) ?? [];
        $token = generateZegoToken($user['uid']);

        return view('patient.voice-call', [
            'id' => $appointmentId,
            'doctor' => $patient,
            'user' => $user,
            'token' => $token,
            'backUrl' => route('doctor.appointments'),
        ]);
    }

    public function createConversation($id)
    {
        $patient = $this->firestore->find('patients', $id);
        $doctor = current_user();

        if (! $doctor) {
            abort(403);
        }

        if (! $patient) {
            abort(404);
        }

        $conversation = $this->firestore->query(
            'conversations',
            [
                [
                    'field' => 'patientId',
                    'op' => '=',
                    'value' => $patient['uid'],
                ],
                [
                    'field' => 'doctorId',
                    'op' => '=',
                    'value' => $doctor['uid'],
                ],
            ],
            null,
            null,
            'createdAt',
            'DESC'
        );

        if (! empty($conversation['documents'])) {

            return redirect()
                ->route('doctor.conversations');
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

        return redirect()
            ->route('doctor.conversations');
    }

    public function availableTimings()
    {
        $workingDays = current_user()['workingDays'] ?? [];
        $workingHours = current_user()['workingHours'] ?? [];
        $breaks = current_user()['breaks'] ?? [];

        return view('doctor.available-timings', [
            'workingDays' => $workingDays,
            'workingHours' => $workingHours,
            'breaks' => $breaks,
        ]);
    }

    public function updateAvailableTimings(Request $request)
    {
        $uid = current_user()['uid'];

        $validated = $request->validate([
            'consultationFee' => 'required|numeric',
            'workingDays' => 'required|array',
            'workingHours' => 'required|array',
            'breaks' => 'nullable|string',
        ]);

        $breaks = [];

        if (! empty($validated['breaks'])) {
            $breaks = explode(',', $validated['breaks']);
        }

        $this->firestore->update('doctors', $uid, [
            'workingDays' => $validated['workingDays'],
            'workingHours' => $validated['workingHours'],
            'breaks' => $breaks,
            'consultationFee' => intval($validated['consultationFee']),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Available timings updated successfully.');
    }

    public function markRead($id)
    {
        $this->firestore->update('conversations', $id, [
            'doctorUnreadCount' => 0,
            'lastReadByDoctor' => now(),
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

        if (! $conversation || ($conversation['doctorId'] ?? '') !== $uid) {
            return response()->json(['success' => false], 404);
        }

        $this->firestore->update('conversations', $id, ['deletedByDoctor' => true]);

        if ($conversation['deletedByPatient'] ?? false) {
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

    public function payout()
    {
        $user = current_user();

        $stripeSetupComplete = false;

        if (
            isset($user['stripeAccountId']) &&
            isset($user['stripeAccountStatus']) &&
            isset($user['stripeDetailsSubmitted']) &&
            isset($user['stripeOnboardingComplete']) &&
            ! empty($user['stripeAccountId']) &&
            $user['stripeAccountStatus'] === 'active' &&
            $user['stripeDetailsSubmitted'] === true &&
            $user['stripeOnboardingComplete'] === true
        ) {
            $stripeSetupComplete = true;
        }

        return view('doctor.payout', [
            'stripeSetupComplete' => $stripeSetupComplete,
        ]);
    }

    public function setupPayout()
    {
        $user = current_user();

        Stripe::setApiKey(config('services.stripe.secret'));

        try {

            if (! isset($user['stripeAccountId']) || ! $user['stripeAccountId'] || $user['stripeAccountId'] == '' || $user['stripeAccountId'] == null) {

                $account = Account::create([
                    'type' => 'express',
                    'country' => 'US', // change dynamically if needed
                    'email' => $user['email'],
                    'capabilities' => [
                        'transfers' => ['requested' => true],
                    ],
                ]);

                $this->firestore->update('doctors', $user['uid'], [
                    'stripeAccountId' => $account->id,
                    'stripeAccountStatus' => $account->charges_enabled ? 'active' : 'pending',
                    'stripeDetailsSubmitted' => $account->details_submitted,
                    'stripeOnboardingComplete' => false,
                    'stripeAccountCreatedAt' => now(),
                ]);

                $stripeAccountId = $account->id;

            } else {

                $stripeAccountId = $user['stripeAccountId'];
            }
            // Create onboarding link
            $accountLink = AccountLink::create([
                'account' => $stripeAccountId,
                'refresh_url' => route('doctor.payout'),
                'return_url' => route('doctor.payout.complete'),
                'type' => 'account_onboarding',
            ]);

            return redirect($accountLink->url);

        } catch (\Exception $e) {
            Log::error('Stripe onboarding error: '.$e->getMessage());

            return back()->with('error', $e->getMessage());
        }
    }

    public function payoutComplete()
    {
        $user = current_user();

        Stripe::setApiKey(config('services.stripe.secret'));

        $account = Account::retrieve($user['stripeAccountId']);

        $this->firestore->update('doctors', $user['uid'], [
            'stripeAccountStatus' => $account->charges_enabled ? 'active' : 'pending',
            'stripeDetailsSubmitted' => $account->details_submitted,
            'stripeOnboardingComplete' => (
                $account->details_submitted &&
                $account->charges_enabled &&
                $account->payouts_enabled
            ),
        ]);

        return redirect()
            ->route('doctor.payout')
            ->with('success', 'Payout account setup completed.');
    }

    public function completeAppointment($id)
    {
        $appointment = $this->firestore->find('appointments', $id);

        $this->firestore->update('appointments', $id, [
            'status' => 'completed',
            'completedAt' => now()->toDateTimeString(),
            'updatedAt' => now()->toDateTimeString(),
        ]);

        if ($appointment) {
            $patient = $this->firestore->find('patients', $appointment['patientId'] ?? '');
            $email = $patient['email'] ?? null;
            if ($email) {
                try {
                    Mail::to($email)->send(new AppointmentCompleted($appointment));
                    if (empty($appointment['reviewReminderCount'])) {
                        $this->firestore->update('appointments', $id, [
                            'reviewReminderCount' => 1,
                            'lastReviewEmailAt' => now()->toDateTimeString(),
                            'updatedAt' => now()->toDateTimeString(),
                        ]);
                    }
                } catch (\Throwable $e) {
                    Log::error('appointment-completed-email-failed', [
                        'appointment' => $id,
                        'email' => $email,
                        'error' => $e->getMessage(),
                    ]);
                }
            }
        }

        $report = DoctorReportController::createFromAppointment($this->firestore, $appointment);

        return redirect()
            ->route('doctor.reports.edit', $report['id'])
            ->with('success', 'Appointment completed. Please fill out the second opinion report.');
    }

    public function acceptAppointment($id)
    {
        $appointment = $this->firestore->find('appointments', $id);

        $this->firestore->update('appointments', $id, [
            'status' => 'confirmed',
            'confirmedAt' => now()->toDateTimeString(),
            'updatedAt' => now()->toDateTimeString(),
        ]);

        if ($appointment) {
            $patient = $this->firestore->find('patients', $appointment['patientId'] ?? '');
            $email = $patient['email'] ?? null;
            if ($email) {
                try {
                    Mail::to($email)->send(new AppointmentConfirmed($appointment));
                } catch (\Throwable $e) {
                    Log::error('appointment-confirmed-email-failed', [
                        'appointment' => $id,
                        'email' => $email,
                        'error' => $e->getMessage(),
                    ]);
                }
            }
        }

        return back()->with('success', 'Appointment accepted successfully.');
    }

    public function toggleAvailability(Request $request)
    {
        $validated = $request->validate([
            'isAvailable' => 'required|boolean',
        ]);

        $uid = current_user()['uid'];

        $this->firestore->update('doctors', $uid, [
            'available' => $validated['isAvailable'] ? true : false,
        ]);

        Cache::forget('home.doctors');

        return response()->json(['success' => true, 'isAvailable' => $validated['isAvailable']]);
    }

    public function rescheduleAppointment(Request $request, $id)
    {
        $validated = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'startTime' => 'required|string', // 24h "H:i", must match one of the doctor's open slots
        ]);

        $doctorUid = current_user()['uid'];

        $appointment = $this->firestore->find('appointments', $id);

        if (! $appointment || ($appointment['doctorId'] ?? '') !== $doctorUid) {
            return response()->json(['success' => false, 'message' => 'Appointment not found.'], 404);
        }

        // Block rescheduling within 24 hours of the appointment
        if (! empty($appointment['date'])) {
            $apptDate = Carbon::parse($appointment['date']);
            if ($apptDate->lte(now()->addHours(24))) {
                return response()->json(['success' => false, 'message' => 'Appointments cannot be rescheduled within 24 hours of the scheduled time.'], 422);
            }
        }

        // Recompute real availability server-side rather than trusting whatever
        // time the client posts — the current appointment's own slot is excluded
        // so it doesn't block itself.
        $availability = $this->availabilityService->getAvailability($doctorUid, $id);

        if (! $availability) {
            return response()->json(['success' => false, 'message' => 'Availability is not set up.'], 422);
        }

        $daySlots = collect($availability['availability'])->firstWhere('date', $validated['date'])['slots'] ?? [];

        if (! in_array($validated['startTime'], $daySlots, true)) {
            return response()->json(['success' => false, 'message' => 'The selected time slot is no longer available. Please choose another.'], 422);
        }

        $slotDuration = $availability['slotDuration'];
        $startTimestamp = strtotime($validated['startTime']);
        $endTimestamp = $startTimestamp + $slotDuration * 60;

        $formattedDate = Carbon::parse($validated['date'])->format('d M Y');
        $startTimeFormatted = date('h:i A', $startTimestamp);
        $endTimeFormatted = date('h:i A', $endTimestamp);

        // Slot times are the doctor's own working-hours values, stored and shown
        // as-is with no timezone conversion — times are UTC throughout so both
        // sides need to convert to their own local time.
        $startDateTime = Carbon::parse($validated['date'].' '.date('H:i:s', $startTimestamp), 'UTC');
        $endDateTime = Carbon::parse($validated['date'].' '.date('H:i:s', $endTimestamp), 'UTC');

        $startTimeUTC = $startDateTime->copy()->setTimezone('UTC');
        $endTimeUTC = $endDateTime->copy()->setTimezone('UTC');

        // Reschedule emails (patient + doctor) are sent by the Firestore
        // onAppointmentStatusChanged Cloud Function, which detects the date/time
        // change on this write and calls AppointmentEmailController::notifyStatus
        // with ?reschedule=true — no need to send them from here too.
        $this->firestore->update('appointments', $id, [
            'date' => $startDateTime,
            'startTime' => $startTimeFormatted,
            'endTime' => $endTimeFormatted,
            'startTimeUTC' => $startTimeUTC,
            'endTimeUTC' => $endTimeUTC,
        ]);

        return response()->json([
            'success' => true,
            'formattedDate' => $formattedDate,
            'startTime' => $startTimeFormatted,
            'endTime' => $endTimeFormatted,
        ]);
    }
}
