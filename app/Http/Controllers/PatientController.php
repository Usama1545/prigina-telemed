<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentCancelled;
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

class PatientController extends Controller
{
    protected $firestore;

    public function __construct(FirestoreService $firestore)
    {
        $this->firestore = $firestore;
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
        // ✅ Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'gender' => 'nullable|in:male,female,other',
            'dob' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

            $imageUrl = 'https://storage.googleapis.com/'.$bucket->name().'/'.$filePath;

            $data['photoUrl'] = $imageUrl;
        }

        $this->firestore->update('patients', $uid, $data);

        return redirect()->back()->with('success', 'Profile updated successfully.');
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
            dd('Password update failed');

            return back()->withErrors(['password' => 'Password update failed']);
        }

        return redirect()->back()->with('success', 'Password updated successfully.');

    }

    public function conversations()
    {
        $uid = current_user()['uid'];

        $filteredConversations = $this->firestore->query('conversations', [
            ['field' => 'patientId', 'op' => '=', 'value' => $uid],
        ], null, null, 'lastMessageTime', 'DESC');

        $conversations = collect($filteredConversations['documents'] ?? [])
            ->map(fn ($conversation) => $this->normalizeConversation($conversation))
            ->all();

        return view('patient.chat', compact('conversations'));

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
            'text' => 'required_without:file|string',
            'type' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf,doc,docx,txt|max:5048',
        ]);
        $conversation = $this->firestore->find('conversations', $id);

        $uid = current_user()['uid'];

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
            return redirect()->back()->with('error', 'Appointment not found.');
        }

        // Block cancellation within 24 hours of the appointment
        if (! empty($appointment['date'])) {
            $apptDate = Carbon::parse($appointment['date']);
            if ($apptDate->lte(now()->addHours(24))) {
                return redirect()->back()->with('error', 'Appointments cannot be cancelled within 24 hours of the scheduled time.');
            }
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

        return redirect()->back()->with('success', 'Appointment cancelled successfully.');
    }

    public function appointmentDetails($id)
    {
        $appointment = $this->firestore->find('appointments', $id);

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
        $conversation = $this->firestore->find('conversations', $id);
        if (! $conversation) {
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
            'token' => $token,
        ]);
    }

    public function videoCall($id)
    {
        $conversation = $this->firestore->find('conversations', $id);

        if (! $conversation) {
            abort(404);
        }

        $doctorId = $conversation['doctorId'];
        $doctor = $this->firestore->find('doctors', $doctorId);

        $user = current_user();

        if (! $user) {
            abort(403);
        }

        $token = generateZegoToken($user['uid']);

        return view('patient.video-call', [
            'id' => $id,
            'doctor' => $doctor,
            'user' => $user,
            'token' => $token,
        ]);
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
