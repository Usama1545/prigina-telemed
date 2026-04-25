<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FirestoreService;
use Illuminate\Support\Facades\Http;
use Kreait\Firebase\Contract\Auth;
use Carbon\Carbon;

class PatientController extends Controller
{
    protected $firestore;

    public function __construct(FirestoreService $firestore)
    {
        $this->firestore = $firestore;
    }

    public function dashboard(Request $request)
    {
        $uid = current_user()['uid'];
        $cursor = $request->query('cursor');

        if ($cursor) {
            $cursor = json_decode($cursor, true);
        }
        $pastAppointments = app(FirestoreService::class)
            ->query('appointments', [
                ['field' => 'patientId', 'op' => '=', 'value' => $uid],
                ['field' => 'status', 'op' => '=', 'value' => 'completed'],
            ])['documents'] ?? [];

        $futureAppointments = app(FirestoreService::class)
            ->query('appointments', [
                ['field' => 'patientId', 'op' => '=', 'value' => $uid],
                ['field' => 'status', 'op' => '=', 'value' => 'confirmed'],
            ])['documents'] ?? [];
    

        return view('patient.dashboard', compact('pastAppointments', 'futureAppointments'));
    }

    public function update(Request $request)
    {
        // ✅ Validation
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'phone'  => 'required|string|max:20',
            'email'  => 'required|email|max:255',
            'gender' => 'nullable|in:male,female,other',
            'dob'    => 'nullable|date',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

            $filePath = "profile_pictures/patients/{$uid}/{$fileName}";

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
        if (!$request->has('cursor') && $direction !== 'prev') {
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
            $cursor = !empty($cursors) ? end($cursors) : null;
            
            // Update session
            session()->put('appointment_cursors', $cursors);
            session()->put('appointment_direction', 'prev');
        }
        
        // Query Firestore
        $result = $this->firestore->paginatedQuery('appointments', [
            ['field' => 'patientId', 'op' => '=', 'value' => $uid],
        ], 50, $cursor, 'createdAt', 'DESC');
        
        $appointments = $result['documents'] ?? [];
        $nextCursor = $result['nextCursor'] ?? null;
        $hasMore = $result['hasMore'] ?? false;
        
        // For previous navigation
        $cursors = session()->get('appointment_cursors', []);
        $hasPrev = ($direction === 'prev') ? !empty($cursors) : count($cursors) > 1;

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
            ['field' => 'patientId', 'op' => '=', 'value' => $uid],
        ],null, null, 'createdAt', 'DESC');

        $conversations = $filteredConversations['documents'] ?? [];

        return view('patient.chat', compact('conversations'));
        
    }

    public function messages($id)
    {
        $messages = $this->firestore->query('messages', [
            ['field' => 'conversationId', 'op' => '=', 'value' => $id],
        ], null, null, 'timestamp', 'ASC');

        return response()->json([
            'messages' => $messages['documents'] ?? [],
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
            'timestamp' => Carbon::now()->format('F j, Y \a\t h:i:s A') . ' UTC' . now()->format('P'),
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

            /** @var \Kreait\Firebase\Contract\Storage $storage */
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
}