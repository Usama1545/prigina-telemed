<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirestoreService;
use App\Services\FirebaseAuthService;
use Google\Cloud\Firestore\FirestoreClient;

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

        $authService = app(FirebaseAuthService::class);
        $firestore = app(FirestoreService::class);

        try {
            $verified = $authService->verifyToken($idToken);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        $uid = $verified->claims()->get('sub');

        $patient = $firestore->find('patients', $uid);

        // ✅ auto-create patient (important)
        if (!$patient) {
            $firestore->createWithId('patients', $uid, [
                'email' => $verified->claims()->get('email'),
                'created_at' => now(),
            ]);
        }

        // ✅ assign role
        if (!$verified->claims()->has('role')) {
            $authService->setCustomClaims($uid, ['role' => 'patient']);
        }

        session([
            'firebase_token' => $idToken,
            'auth_uid' => $uid,
            'auth_role' => 'patient',
            'auth_user' => [
                'name' => $verified->claims()->get('name'),
                'email' => $verified->claims()->get('email'),
            ]
        ]);
        $request->session()->save(); // ✅ ADD THIS

        return response()->json([
            'message' => 'Login successful',
            'role' => 'patient'
        ]);
    }

    public function dashboard(){
        $user = current_user();

        if(!$user){
            return redirect('/login');
        }

        if($user['role'] === 'patient'){
            return redirect('/patient/dashboard');
        }elseif($user['role'] === 'doctor'){
            return redirect('/doctors/dashboard');
        }else{
            return redirect('/login');
        }
    }

    public function profile(Request $request)
    {
        $user = current_user();

        if(!$user){
            return redirect('/login');
        }

        if($user['role'] === 'patient'){
            return redirect('/patient/profile');
        }elseif($user['role'] === 'doctor'){
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
}
