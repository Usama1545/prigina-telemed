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
        session()->flush();
        return view('login');
    }

    public function doctorRegister()
    {
        $firestore = app(FirestoreService::class);

        $specializations = $firestore->get('categories');
        return view('doctor-register', compact('specializations'));
    }

    public function registerDoctor(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'license_number' => 'required',
            'qualification' => 'required',
            'experience' => 'required|integer|min:0',
            'specialization' => 'required',
            'password' => 'required|confirmed|min:6',
            'medical_license' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'degree_certificate' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'id_proof' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'clinic_registration' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $firestore = app(FirestoreService::class);

        $uid = Str::uuid()->toString();

        $data = $request->except([
            'medical_license',
            'degree_certificate',
            'id_proof',
            'clinic_registration'
        ]);

        if ($request->hasFile('medical_license')) {
            $data['medical_license'] = $request->file('medical_license')->store('doctors/licenses');
        }

        if ($request->hasFile('degree_certificate')) {
            $data['degree_certificate'] = $request->file('degree_certificate')->store('doctors/degrees');
        }

        if ($request->hasFile('id_proof')) {
            $data['id_proof'] = $request->file('id_proof')->store('doctors/id');
        }

        if ($request->hasFile('clinic_registration')) {
            $data['clinic_registration'] = $request->file('clinic_registration')->store('doctors/clinic');
        }

        $data['password'] = bcrypt($request->password);

        $data['uid'] = $uid;
        $data['role'] = 'doctor';

        $firestore->createWithId('doctors', $uid, $data);

        return redirect('/login');
    }
}
