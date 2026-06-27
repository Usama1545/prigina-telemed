<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Api\AppointmentEmailController;
use App\Http\Controllers\Api\AuthEmailController;
use App\Http\Controllers\ChatWebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/chat/webhook', [ChatWebhookController::class, 'handle']);
Route::post('/chat/webhook/new_appointment', [ChatWebhookController::class, 'appointment']);

// =============================
// Admin API Routes
// =============================

// Auth email actions (custom branded emails via Firebase link generation)
Route::post('/auth/send-verification-email', [AuthEmailController::class, 'sendVerificationEmail']);
Route::post('/auth/send-password-reset', [AuthEmailController::class, 'sendPasswordResetEmail']);

// Appointment email actions
Route::post('/appointments/{id}/send-reminder', [AppointmentEmailController::class, 'sendReminder']);
Route::post('/appointments/{id}/notify-status', [AppointmentEmailController::class, 'notifyStatus']);

// Public admin routes (no auth required)
Route::post('/admin/authenticate', [AdminAuthController::class, 'authenticateToken'])->name('api.admin.authenticate-token');

// Protected admin routes
Route::middleware(['admin.auth'])->prefix('admin')->group(function () {
    Route::get('/stats', [AdminDashboardController::class, 'getStats']);
    Route::get('/doctors', [AdminDashboardController::class, 'getDoctorsList']);
    Route::get('/doctors/{id}', [AdminDashboardController::class, 'getDoctorDetails']);
    Route::post('/doctors/{id}/approve', [AdminDashboardController::class, 'approvDoctor']);
    Route::post('/doctors/{id}/reject', [AdminDashboardController::class, 'rejectDoctor']);

    Route::get('/patients', [AdminDashboardController::class, 'getPatientsList']);
    Route::get('/appointments', [AdminDashboardController::class, 'getAppointmentsList']);

    Route::get('/settings', [AdminDashboardController::class, 'getSettings']);
    Route::post('/settings', [AdminDashboardController::class, 'updateSettings']);
});
