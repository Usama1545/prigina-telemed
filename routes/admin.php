<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\AdminPatientController;
use App\Http\Controllers\Admin\AdminPaymentController;
use App\Http\Controllers\Admin\AdminReportController;
use Illuminate\Support\Facades\Route;

// =============================
// PUBLIC ADMIN ROUTES (No Auth)
// =============================

Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminAuthController::class, 'authenticate'])->name('authenticate');
Route::post('/authenticate-token', [AdminAuthController::class, 'authenticateToken'])->name('authenticate-token');

// =============================
// PROTECTED ADMIN ROUTES
// =============================

Route::middleware(['admin.auth'])->group(function () {
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('/current-admin', [AdminAuthController::class, 'getCurrentAdmin'])->name('current-admin');

    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
    Route::get('/index', [AdminDashboardController::class, 'index'])->name('index-page');

    Route::get('/appointment-list', [AdminDashboardController::class, 'appointments'])->name('appointment-list');
    Route::get('/appointments/data', [AdminDashboardController::class, 'appointmentData'])->name('appointments.data');
    Route::patch('/appointments/{appointment}/status', [AdminDashboardController::class, 'updateAppointmentStatus'])->name('appointments.status');
    Route::post('/appointments/{appointment}/payment/hold', [AdminPaymentController::class, 'holdPayment'])->name('appointments.payment.hold');
    Route::post('/appointments/{appointment}/payment/release', [AdminPaymentController::class, 'releasePayment'])->name('appointments.payment.release');
    Route::post('/appointments/{appointment}/payment/refund', [AdminPaymentController::class, 'refundPayment'])->name('appointments.payment.refund');
    Route::get('/doctor-list', [AdminDoctorController::class, 'index'])->name('doctor-list');
    Route::get('/doctors/data', [AdminDoctorController::class, 'data'])->name('doctors.data');
    Route::get('/doctors/{doctor}', [AdminDoctorController::class, 'show'])->name('doctors.show');
    Route::patch('/doctors/{doctor}/active', [AdminDoctorController::class, 'toggleActive'])->name('doctors.active');
    Route::patch('/doctors/{doctor}/top', [AdminDoctorController::class, 'toggleTopDoctor'])->name('doctors.top');
    Route::post('/doctors/{doctor}/approve', [AdminDoctorController::class, 'approve'])->name('doctors.approve');
    Route::post('/doctors/{doctor}/decline', [AdminDoctorController::class, 'decline'])->name('doctors.decline');
    Route::patch('/doctors/{doctor}/status', [AdminDashboardController::class, 'toggleDoctorStatus'])->name('doctors.status');
    Route::get('/patient-list', [AdminPatientController::class, 'index'])->name('patient-list');
    Route::get('/patients/data', [AdminPatientController::class, 'data'])->name('patients.data');
    Route::patch('/patients/{patient}/active', [AdminPatientController::class, 'toggleActive'])->name('patients.active');
    Route::get('/settings', [AdminDashboardController::class, 'settings'])->name('settings');
    Route::put('/settings', [AdminDashboardController::class, 'updateSettings'])->name('settings.update');
    Route::get('/specialities', [AdminDashboardController::class, 'specialities'])->name('specialities');
    Route::get('/specialities/data', [AdminDashboardController::class, 'specialityData'])->name('specialities.data');
    Route::post('/specialities', [AdminDashboardController::class, 'storeSpeciality'])->name('specialities.store');
    Route::put('/specialities/{speciality}', [AdminDashboardController::class, 'updateSpeciality'])->name('specialities.update');
    Route::PATCH('/specialities/{speciality}/status', [AdminDashboardController::class, 'updateSpecialityStatus'])->name('specialities.update.status');
    Route::delete('/specialities/{speciality}', [AdminDashboardController::class, 'deleteSpeciality'])->name('specialities.delete');
    Route::get('/notifications', [AdminNotificationController::class, 'index'])->name('notifications');
    Route::get('/notifications/feed', [AdminNotificationController::class, 'feed'])->name('notifications.feed');
    Route::patch('/notifications/{id}/read', [AdminNotificationController::class, 'markRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [AdminNotificationController::class, 'markAllRead'])->name('notifications.read-all');

    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports');
    Route::get('/reviews', [AdminDashboardController::class, 'reviews'])->name('reviews');
    Route::delete('/reviews/{review}', [AdminDashboardController::class, 'deleteReview'])->name('reviews.delete');

    Route::get('/api/stats', [AdminDashboardController::class, 'getStats'])->name('api.stats');
    Route::get('/api/doctors', [AdminDashboardController::class, 'getDoctorsList'])->name('api.doctors');
    Route::get('/api/patients', [AdminDashboardController::class, 'getPatientsList'])->name('api.patients');
    Route::get('/api/appointments', [AdminDashboardController::class, 'getAppointmentsList'])->name('api.appointments');
    Route::get('/api/settings', [AdminDashboardController::class, 'getSettings'])->name('api.settings');

    Route::get('/blank-page', function () {
        return view('admin.blank-page');
    })->name('blank-page');

    Route::get('/calendar', function () {
        return view('admin.calendar');
    })->name('calendar');

    Route::get('/components', function () {
        return view('admin.components');
    })->name('components');

    Route::get('/data-tables', function () {
        return view('admin.data-tables');
    })->name('data-tables');

    Route::get('/error-404', function () {
        return view('admin.error-404');
    })->name('error-404');

    Route::get('/error-500', function () {
        return view('admin.error-500');
    })->name('error-500');

    Route::get('/forgot-password', function () {
        return view('admin.forgot-password');
    })->name('forgot-password');

    Route::get('/form-basic-inputs', function () {
        return view('admin.form-basic-inputs');
    })->name('form-basic');

    Route::get('/form-input-groups', function () {
        return view('admin.form-input-groups');
    })->name('form-inputs');

    Route::get('/form-horizontal', function () {
        return view('admin.form-horizontal');
    })->name('form-horizontal');

    Route::get('/form-vertical', function () {
        return view('admin.form-vertical');
    })->name('form-vertical');

    Route::get('/form-mask', function () {
        return view('admin.form-mask');
    })->name('form-mask');

    Route::get('/form-validation', function () {
        return view('admin.form-validation');
    })->name('form-validation');

    Route::get('/invoice-report', function () {
        return view('admin.invoice-report');
    })->name('invoice-report');

    Route::get('/invoice', function () {
        return view('admin.invoice');
    })->name('invoice');

    Route::get('/lock-screen', function () {
        return view('admin.lock-screen');
    })->name('lock-screen');

    Route::get('/profile', [AdminAuthController::class, 'profile'])->name('profile');
    Route::post('/profile/password', [AdminAuthController::class, 'changePassword'])->name('profile.password');

    Route::get('/register', function () {
        return view('admin.register');
    })->name('register');

    Route::get('/tables-basic', function () {
        return view('admin.tables-basic');
    })->name('tables-basic');

    Route::get('/transactions-list', function () {
        return view('admin.transactions-list');
    })->name('transactions-list');
});
