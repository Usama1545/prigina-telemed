<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatWebhookController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/chat/webhook', [ChatWebhookController::class, 'handle']);
Route::post('/chat/webhook/new_appointment', [ChatWebhookController::class, 'appointment']);

// =============================
// Admin API Routes
// =============================

// Public admin routes (no auth required)
Route::post('/admin/authenticate', [AdminAuthController::class, 'authenticateToken'])->name('admin.authenticate-token');

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


