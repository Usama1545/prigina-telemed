<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use App\Mail\PasswordReset;
use App\Services\FirebaseAuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthEmailController extends Controller
{
    public function sendVerificationEmail(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        try {
            $link = app(FirebaseAuthService::class)
                ->getEmailVerificationLink($request->email);

            Mail::to($request->email)
                ->send(new EmailVerification($link));

            return response()->json(['success' => true]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Failed to send verification email.',
            ], 500);
        }
    }

    public function sendPasswordResetEmail(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        try {
            $link = app(FirebaseAuthService::class)
                ->getPasswordResetLink($request->email);

            Mail::to($request->email)
                ->send(new PasswordReset($link));

            return response()->json(['success' => true]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Failed to send password reset email.',
            ], 500);
        }
    }
}
