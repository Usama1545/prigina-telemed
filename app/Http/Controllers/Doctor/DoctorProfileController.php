<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FirestoreService;
use Illuminate\Support\Facades\Http;
use Kreait\Firebase\Contract\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Stripe\Stripe;
use Stripe\Account;
use Stripe\AccountLink;

class DoctorProfileController extends Controller
{
    protected $firestore;

    public function __construct(FirestoreService $firestore)
    {
        $this->firestore = $firestore;
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

        $totalEarnings = $pastAppointments->sum(function ($appointment) {
            return $appointment['amount'] ?? 0;
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
            'name'   => 'required|string|max:255',
            'phone'  => 'required|string|max:20',
            'license_number' => 'required',
            'qualification' => 'required',
            'experience' => 'required|string',
            'specializations' => 'required|array|min:1',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'consultationFee' => 'required|numeric',
            'workingDays' => 'required|array',
            'workingHours' => 'required|array',
            'breaks' => 'nullable|string',
        ]);

        $uid = current_user()['uid'];

        $data = collect($validated)->only([
            'name',
            'phone',
            'email',
            'gender',
            'dob',
        ])->toArray();

        // ✅ Handle Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();

            $filePath = "profile_pictures/doctor_profiles/{$uid}/{$fileName}";

            /** @var \Kreait\Firebase\Contract\Storage $storage */
            $storage = app('firebase.storage');
            $bucket = $storage->getBucket();

            $bucket->upload(
                fopen($image->getRealPath(), 'r'),
                [
                    'name' => $filePath,
                    'predefinedAcl' => 'publicRead',
                ]
            );

            $imageUrl = "https://storage.googleapis.com/" . $bucket->name() . "/" . $filePath;

            $data['profilePicture'] = $imageUrl;
        }

        $breaks = [];

        if (!empty($validated['breaks'])) {
            $breaks = explode(',', $validated['breaks']);
        }

        $this->firestore->update('doctors', $uid, [
            ...$data,
            'breaks' => $breaks,
            'consultationFee' => intval($validated['consultationFee']),
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

        $result = $this->firestore->paginatedQuery(
            'appointments',
            [
                [
                    'field' => 'doctorId',
                    'op' => '=',
                    'value' => $uid
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
        
        return view('doctor.profile-settings', compact('doctor', 'specializations', 'workingDays', 'workingHours', 'breaks'));
    }

    public function changePassword(Request $request, Auth $auth)
    {

        $email = current_user()['email'];
        $uid   = current_user()['uid'];

        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);
  


        $response = Http::post(
            'https://identitytoolkit.googleapis.com/v1/accounts:signInWithPassword?key=' . config('services.firebase.api_key'),
            [
                'email' => $email,
                'password' => $request->current_password,
                'returnSecureToken' => true,
            ]
        );

        if ($response->failed()) {
            return back()->withErrors([
                'current_password' => 'Current password is incorrect'
            ]);
        }

        $updatedUser = $auth->updateUser($uid, [
            'password' => $request->password,
        ]);

        // Debug (temporary)
        if (!$updatedUser) {
            dd('Password update failed');
            return back()->withErrors(['password' => 'Password update failed']);
        }

        return redirect()->back()->with('success', 'Password updated successfully.');

    }

    public function conversations()
    {
        $uid = current_user()['uid'];

        $filteredConversations = $this->firestore->query('conversations', [
            ['field' => 'doctorId', 'op' => '=', 'value' => $uid],
        ],null, null, 'lastMessageTime', 'DESC');

        $conversations = collect($filteredConversations['documents'] ?? [])
            ->map(fn ($conversation) => $this->normalizeConversation($conversation))
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
            $fileName = time() . '_' . $file->getClientOriginalName();

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

            $imageUrl = "https://storage.googleapis.com/" . $bucket->name() . "/" . $filePath;


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
            'lastMessage' => $data['text'] ,
            'lastMessageSender' => current_user()['uid'] ?? '',
            'lastMessageTime' => now(),
            'patientUnreadCount' => ((int) ($conversation['patientUnreadCount'] ?? 0)) + 1,
            'updatedAt' => now(),
        ]);

        // SAVE TO FIRESTORE
        $this->firestore->create('messages', $data);

        return response()->json([
            'success' => true,
            'message' => $data
        ]);
    }

    public function cancelAppointment($id)
    {
        $this->firestore->update('appointments', $id, [
            'status' => 'cancelled',
        ]);

        return redirect()->back()->with('success', 'Appointment cancelled successfully.');
    }

    public function appointmentDetails($id)
    {
        $appointment = $this->firestore->find('appointments', $id);

        return response()->json($appointment);
    }

    public function audioCall($id)
    {
        $conversation = $this->firestore->find('conversations', $id);
        if (!$conversation) {
            abort(404);
        }

        $doctorId = $conversation['doctorId'];
        $doctor = $this->firestore->find('doctors', $doctorId);

        $user = current_user();

        $token = generateZegoToken($user['uid']);

        return view('patient.voice-call', [
            'id' => $id,
            'doctor' => $doctor,
            'user' => $user,
            'token' => $token
        ]);
    }

    public function videoCall($id)
    {
        $conversation = $this->firestore->find('conversations', $id);

        if (!$conversation) {
            abort(404);
        }

        $doctorId = $conversation['doctorId'];
        $doctor = $this->firestore->find('doctors', $doctorId);

        $user = current_user();

        if (!$user) {
            abort(403);
        }

        $token = generateZegoToken($user['uid']);

        return view('patient.video-call', [
            'id'     => $id,
            'doctor' => $doctor,
            'user'   => $user,
            'token'  => $token,
        ]);
    }

    public function createConversation($id)
    {
        $patient = $this->firestore->find('patients', $id);
        $doctor = current_user();

        if (!$doctor) {
            abort(403);
        }

        if (!$patient) {
            abort(404);
        }

        $conversation = $this->firestore->query(
            'conversations',
            [
                [
                    'field' => 'patientId',
                    'op' => '=',
                    'value' => $patient['uid']
                ],
                [
                    'field' => 'doctorId',
                    'op' => '=',
                    'value' => $doctor['uid']
                ],
            ],
            null,
            null,
            'createdAt',
            'DESC'
        );

        if (!empty($conversation['documents'])) {

            return redirect()
                ->route('doctor.conversations');
        }
        $docID = Str::random(60);
        $this->firestore->createWithId('conversations', $docID, [
            'doctorId' => $doctor['uid'],
            'doctorName' => $doctor['name'] ?? '',
            'doctorSpecialty' =>
                $doctor['specializations'][0] ?? '',
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

        if (!empty($validated['breaks'])) {
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
            !empty($user['stripeAccountId']) &&
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

            if (!isset($user['stripeAccountId']) || !$user['stripeAccountId']) {

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
                    'stripeAccountCreatedAt' => now()
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
}
