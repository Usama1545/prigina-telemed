<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FirebaseAuthService;
use App\Services\FirestoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminAuthController extends Controller
{
    protected $firebaseAuth;
    protected $firestore;

    public function __construct()
    {
        $this->firebaseAuth = app(FirebaseAuthService::class);
        $this->firestore = app(FirestoreService::class);
    }

    /**
     * Show admin login form
     */
    public function showLogin()
    {
        // Redirect to dashboard if already logged in
        if (session('firebase_token') && session('auth_role') === 'admin') {
            return redirect('/admin/index');
        }

        return view('admin.login');
    }

    /**
     * Authenticate admin with Firebase
     */
    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        try {
            // Get Firebase token from frontend (you'll need to integrate Firebase JS SDK)
            $token = $request->input('firebase_token');
            $refreshToken = $request->input('firebase_refresh_token');

            if (!$token) {
                return back()
                    ->withErrors(['email' => 'Invalid credentials. Please try again.'])
                    ->withInput($request->except('password'));
            }

            // Verify token with Firebase
            $verified = $this->firebaseAuth->verifyToken($token);
            $uid = $verified->claims()->get('sub');
            $email = $verified->claims()->get('email');

            // Check if user exists in admins collection
            $admin = $this->firestore->find('admins', $uid);

            if (!$admin) {
                Log::warning("Login attempt for non-admin user: {$email}");
                return back()
                    ->withErrors(['email' => 'You do not have admin access.'])
                    ->withInput($request->except('password'));
            }

            // Check if admin is active
            if (($admin['isActive'] ?? false) === false) {
                Log::warning("Login attempt for inactive admin: {$email}");
                return back()
                    ->withErrors(['email' => 'Your account has been deactivated.'])
                    ->withInput($request->except('password'));
            }

            // Store in session
            session([
                'firebase_token' => $token,
                'firebase_refresh_token' => $refreshToken ?? '',
                'auth_uid' => $uid,
                'auth_email' => $email,
                'auth_role' => 'admin',
                'admin_name' => $admin['name'] ?? '',
                'is_super_admin' => $admin['isSuperAdmin'] ?? false,
            ]);

            // Log successful login
            Log::info("Admin login successful: {$email}");

            return redirect('/admin/index')->with('success', 'Welcome back!');

        } catch (\Exception $e) {
            Log::error("Admin authentication error: " . $e->getMessage());
            return back()
                ->withErrors(['email' => 'Authentication failed. Please try again.'])
                ->withInput($request->except('password'));
        }
    }

    /**
     * Authenticate via Firebase token (for API calls)
     */
    public function authenticateToken(Request $request)
    {
        try {
            $token = $request->input('token');
            $refreshToken = $request->input('refreshToken');

            if (!$token) {
                return response()->json(['error' => 'No token provided'], 401);
            }

            // Verify token
            $verified = $this->firebaseAuth->verifyToken($token);
            $uid = $verified->claims()->get('sub');

            // Check if admin exists and is active
            $admin = $this->firestore->find('admins', $uid);

            if (!$admin || ($admin['isActive'] ?? false) === false) {
                return response()->json(['error' => 'Admin account not found or inactive'], 403);
            }

            // Store session
            session([
                'firebase_token' => $token,
                'firebase_refresh_token' => $refreshToken ?? '',
                'auth_uid' => $uid,
                'auth_email' => $verified->claims()->get('email'),
                'auth_role' => 'admin',
                'admin_name' => $admin['name'] ?? '',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Authentication successful',
                'admin' => [
                    'uid' => $uid,
                    'email' => $admin['email'] ?? '',
                    'name' => $admin['name'] ?? '',
                    'permissions' => $admin['permissions'] ?? [],
                ]
            ]);

        } catch (\Exception $e) {
            Log::error("Token authentication error: " . $e->getMessage());
            return response()->json(['error' => 'Invalid token'], 401);
        }
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        $adminEmail = session('auth_email');
        
        session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($adminEmail) {
            Log::info("Admin logout: {$adminEmail}");
        }

        return redirect('/admin/login')->with('success', 'Logged out successfully.');
    }

    /**
     * Get current admin info
     */
    public function getCurrentAdmin()
    {
        if (!session('auth_role') === 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json([
            'uid' => session('auth_uid'),
            'email' => session('auth_email'),
            'name' => session('admin_name'),
            'isSuperAdmin' => session('is_super_admin', false),
        ]);
    }
}
