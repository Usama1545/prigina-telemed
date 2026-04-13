<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FirestoreService;
use Illuminate\Support\Facades\Http;
use Kreait\Firebase\Contract\Auth;

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
        ], 10, $cursor, 'createdAt', 'DESC');
        
        $appointments = $result['documents'] ?? [];
        $nextCursor = $result['nextCursor'] ?? null;
        $hasMore = $result['hasMore'] ?? false;
        
        // For previous navigation
        $cursors = session()->get('appointment_cursors', []);
        $hasPrev = ($direction === 'prev') ? !empty($cursors) : count($cursors) > 1;
        
        return view('patient.appointments', [
            'appointments' => $appointments,
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
}