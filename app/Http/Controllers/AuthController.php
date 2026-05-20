<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirestoreService;
use App\Services\FirebaseAuthService;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $firestore;

    public function __construct()
    {
        $this->firestore = new FirestoreClient([
            'projectId' => config('services.firebase.project_id'),
        ]);
    }
    public function login(Request $request)
    {
        $idToken = $request->token;
        $refreshToken = $request->refreshToken;

        $authService = app(FirebaseAuthService::class);
        $firestore = app(FirestoreService::class);

        try {
            $verified = $authService->verifyToken($idToken);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        $uid = $verified->claims()->get('sub');
        $email = $verified->claims()->get('email');
        $name = $verified->claims()->get('name');

        $doctor = $firestore->find('doctors', $uid);
        $patient = $firestore->find('patients', $uid);

        if ($doctor) {

            // Doctor account disabled
            if (($doctor['isActive'] ?? false) === false) {

                return response()->json([
                    'error' => 'Your account has been deactivated. Please contact administrator.'
                ], 403);
            }

            if (($doctor['isEmailVerified'] ?? false) === false) {

                return response()->json([
                    'error' => 'Your email address is not verified yet.'
                ], 403);
            }

            if (($doctor['isVerified'] ?? false) === false) {

                return response()->json([
                    'error' => !empty($doctor['rejectionReason']) ? $doctor['rejectionReason']
                        : 'Your account is currently pending verification.'
                ], 403);
            }

            $role = 'doctor';
            $userData = $doctor;
        } elseif ($patient) {
            $role = 'patient';
            $userData = $patient;
        } else {
            $role = 'patient';

            $firestore->createWithId('patients', $uid, [
                'email' => $email,
                'created_at' => now(),
            ]);

            $userData = [
                'email' => $email
            ];
        }

        $authService->setCustomClaims($uid, ['role' => $role]);

        session([
            'firebase_token' => $idToken,
            'firebase_refresh_token' => $refreshToken,
            'auth_uid' => $uid,
            'auth_role' => $role,
            'auth_user' => [
                'name' => $name,
                'email' => $email,
            ]
        ]);

        $request->session()->save();

        return response()->json([
            'message' => 'Login successful',
            'role' => $role
        ]);
    }

    public function dashboard()
    {
        $user = current_user();

        if (!$user) {
            return redirect('/login');
        }

        $role = session('auth_role');

        if ($role === 'patient') {
            return redirect('/patient/dashboard');
        } elseif ($role === 'doctor') {
            return redirect('/doctor/dashboard');
        }

        return redirect('/login');
    }

    public function profile(Request $request)
    {
        $user = current_user();

        if(!$user){
            return redirect('/login');
        }
        $role = session('auth_role');
        if($role === 'patient'){
            return redirect('/patient/profile');
        }elseif($role === 'doctor'){
            return redirect('/doctors/profile');
        }else{
            return redirect('/login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        try {
            app(FirebaseAuthService::class)->sendPasswordResetLink($request->email);
        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            // Keep the response generic so the form does not reveal registered emails.
        } catch (\Throwable $e) {
            report($e);
        }

        return back()->with(
            'status',
            'a password reset link has been sent. Please check your email.'
        );
    }

    public function doctorRegister()
    {
        $firestore = app(FirestoreService::class);

        $specializations = $firestore->get('categories');
        return view('doctor.register', compact('specializations'));
    }

    public function registerDoctor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'license_number' => 'required',
            'qualification' => 'required',
            'experience' => 'required|string',
            'specializations' => 'required|array|min:1',
            'password' => 'required|confirmed|min:6',
            'medical_license' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'degree_certificate' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'id_proof' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'clinic_registration' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $firestore = app(FirestoreService::class);

        $authService = app(FirebaseAuthService::class);

        $firebaseUser = $authService->createUser([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'claims' => [
                'role' => 'doctor'
            ]
        ]);

        if (!$firebaseUser['success']) {

            return response()->json([
                'message' => $firebaseUser['message'],
                'errors' => [
                    'email' => [$firebaseUser['message']],
                ],
            ], 422);
        }

        $uid = $firebaseUser['uid'];

        try {
            $data = $request->except([
                'medical_license',
                'degree_certificate',
                'id_proof',
                'clinic_registration'
            ]);

            if ($request->hasFile('medical_license')) {
                $medical_license = $request->file('medical_license');
                $filePath = "doctor_documents/{$uid}/medical_license.{$medical_license->getClientOriginalExtension()}";

                /** @var \Kreait\Firebase\Contract\Storage $storage */
                $storage = app('firebase.storage');
                $bucket = $storage->getBucket();

                $bucket->upload(
                    fopen($medical_license->getRealPath(), 'r'),
                    [
                        'name' => $filePath,
                        'predefinedAcl' => 'publicRead',
                    ]
                );

                $data['documentUrls']['medical_license'] = "https://storage.googleapis.com/" . $bucket->name() . "/" . $filePath;
            }

            if ($request->hasFile('degree_certificate')) {
                $degree_certificate = $request->file('degree_certificate');
                $filePath = "doctor_documents/{$uid}/degree_certificate.{$degree_certificate->getClientOriginalExtension()}";

                /** @var \Kreait\Firebase\Contract\Storage $storage */
                $storage = app('firebase.storage');
                $bucket = $storage->getBucket();

                $bucket->upload(
                    fopen($degree_certificate->getRealPath(), 'r'),
                    [
                        'name' => $filePath,
                        'predefinedAcl' => 'publicRead',
                    ]
                );

                $data['documentUrls']['degree_certificate'] = "https://storage.googleapis.com/" . $bucket->name() . "/" . $filePath;
            }

            if ($request->hasFile('id_proof')) {
                $id_proof = $request->file('id_proof');
                $filePath = "doctor_documents/{$uid}/id_proof.{$id_proof->getClientOriginalExtension()}";

                /** @var \Kreait\Firebase\Contract\Storage $storage */
                $storage = app('firebase.storage');
                $bucket = $storage->getBucket();

                $bucket->upload(
                    fopen($id_proof->getRealPath(), 'r'),
                    [
                        'name' => $filePath,
                        'predefinedAcl' => 'publicRead',
                    ]
                );

                $data['documentUrls']['id_proof'] = "https://storage.googleapis.com/" . $bucket->name() . "/" . $filePath;
            }

            if ($request->hasFile('clinic_registration')) {
                $clinic_registration = $request->file('clinic_registration');
                $filePath = "doctor_documents/{$uid}/clinic_registration.{$clinic_registration->getClientOriginalExtension()}";

                /** @var \Kreait\Firebase\Contract\Storage $storage */
                $storage = app('firebase.storage');
                $bucket = $storage->getBucket();

                $bucket->upload(
                    fopen($clinic_registration->getRealPath(), 'r'),
                    [
                        'name' => $filePath,
                        'predefinedAcl' => 'publicRead',
                    ]
                );

                $data['documentUrls']['clinic_registration'] = "https://storage.googleapis.com/" . $bucket->name() . "/" . $filePath;
            }

            $data['password'] = bcrypt($request->password);

            $data['uid'] = $uid;
            $data['role'] = 'doctor';
            $data['breaks'] = [];
            $data['createdAt'] = now();
            $data['documentsStatus'] = 'uploaded'; // Default status, can be updated by doctor later
            $data['consultationFee'] = 0; // Default fee, can be updated by doctor later
            $data['documentsUploadedAt'] = now(); // Default fee, can be updated by doctor later
            $data['isActive'] = true; // Default fee, can be updated by doctor later
            $data['isEmailVerified'] = false; // Default fee, can be updated by doctor later
            $data['isTopDoctor'] = false; // Default fee, can be updated by doctor later
            $data['isVerified'] = false; // Default fee, can be updated by doctor later
            $data['rating'] = 0; // Default fee, can be updated by doctor later
            $data['rejectionReason'] = ""; // Default fee, can be updated by doctor later
            $data['slotDuration'] = 30; // Default fee, can be updated by doctor later
            $data['status'] = 'pending'; // Default fee, can be updated by doctor later
            $data['timezone'] = $request->timezone ?? 'UTC'; // Default fee, can be updated by doctor later
            $data['totalReviews'] = 0; // Default fee, can be updated by doctor later
            $data['workingDays'] = []; // Default fee, can be updated by doctor later
            $data['workingHours'] = []; // Default fee, can be updated by doctor later
            $data['updatedAt'] = now(); // Default fee, can be updated by doctor later
            $data['available'] = false; // Default fee, can be updated by doctor later
            $data['specializations'] = $request->specializations; // Default fee, can be updated by doctor later

            $firestore->createWithId('doctors', $uid, $data);
        } catch (\Throwable $e) {
            report($e);

            try {
                $authService->deleteUser($uid);
            } catch (\Throwable $deleteException) {
                report($deleteException);
            }

            return response()->json([
                'message' => 'We could not complete your registration. Please check your documents and try again.',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'email' => $request->email,
            'password' => $request->password,
        ], 200);
    }

     public function registerPatient(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'password' => 'required|confirmed|min:6',
        ]);

        $firestore = app(FirestoreService::class);

        $authService = app(FirebaseAuthService::class);

        $firebaseUser = $authService->createUser([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'claims' => [
                'role' => 'patient'
            ]
        ]);

        if (!$firebaseUser['success']) {

            return response()->json([
                'message' => $firebaseUser['message'],
                'errors' => [
                    'email' => [$firebaseUser['message']],
                ],
            ], 422);
        }

        $uid = $firebaseUser['uid'];

       
        $data['password'] = bcrypt($request->password);

        $data['uid'] = $uid;
        $data['role'] = 'patient';
        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['dob'] = $request->dob;
        $data['gender'] = $request->gender;
        $data['createdAt'] = now();
        $data['isActive'] = true; // Default fee, can be updated by doctor later
        $data['isEmailVerified'] = false; // Default fee, can be updated by doctor later
        $data['timezone'] = $request->timezone ?? 'UTC'; // Default fee, can be updated by doctor later
        $data['updatedAt'] = now(); // Default fee, can be updated by doctor later
        $data['medicalConditions'] = ""; // Default fee, can be updated by doctor later
        $data['photoUrl'] = null; // Default fee, can be updated by doctor later
        $data['bloodGroup'] = "Not Set"; // Default fee, can be updated by doctor later
        $data['allergies'] = "None"; // Default fee, can be updated by doctor later
        $data['height'] = ""; // Default fee, can be updated by doctor later
        $data['weight'] = ""; // Default fee, can be updated by doctor later
        $data['age'] = $request->dob ? \Carbon\Carbon::parse($request->dob)->age : null; // Default fee, can be updated by doctor later

        $firestore->createWithId('patients', $uid, $data);

        return response()->json([
            'success' => true,
            'email' => $request->email,
            'password' => $request->password,
        ], 200);
    }

    public function googlePatientRegister(Request $request)
    {
        try {

            $idToken = $request->token;

            $verifiedIdToken =
                app('firebase.auth')->verifyIdToken($idToken);

            $uid = $verifiedIdToken->claims()->get('sub');

            $firebaseUser =
                app('firebase.auth')->getUser($uid);

            $email = $firebaseUser->email;

            $name = $firebaseUser->displayName;

            $photo = $firebaseUser->photoUrl;

            $phone = $firebaseUser->phoneNumber;

            $existing =
                $this->firestore
                    ->getDocumentByField(
                        'users',
                        'email',
                        $email
                    );

            if (!$existing) {

                $userData = [
                    'uid' => $uid,
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'photo' => $photo,
                    'role' => 'patient',
                    'provider' => 'google',
                    'status' => 'active',
                    'createdAt' => now()->timestamp,
                ];

                $this->firestore->setDocument(
                    'users',
                    $uid,
                    $userData
                );

                $existing = $userData;
            }

            session([
                'firebase_user' => $existing
            ]);

            return response()->json([
                'success' => true,
                'redirect' => '/patient/dashboard'
            ]);

        }
        catch (\Exception $e) {

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function createUser(array $data)
    {
        try {

            $user = $this->auth->createUser([
                'email' => $data['email'],
                'password' => $data['password'],
                'displayName' => $data['name'] ?? null,
                'emailVerified' => $data['emailVerified'] ?? false,
                'disabled' => false,
            ]);

            // Optional custom claims
            if (!empty($data['claims'])) {
                $this->auth->setCustomUserClaims(
                    $user->uid,
                    $data['claims']
                );
            }

            return [
                'success' => true,
                'uid' => $user->uid,
                'user' => $user,
            ];

        } catch (\Throwable $e) {

            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}
