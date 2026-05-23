<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;

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

    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    Route::get('/index', function () {
        return view('admin.index');
    })->name('index-page');

    Route::get('/appointment-list', function () {
        return view('admin.appointment-list');
    })->name('appointment-list');

    Route::get('/blank-page', function () {
        return view('admin.blank-page');
    })->name('blank-page');

    Route::get('/calendar', function () {
        return view('admin.calendar');
    })->name('calendar');

    Route::get('/components', function () {
        return view('admin.components');
    })->name('components');

    Route::get('/doctor-list', function () {
        return view('admin.doctor-list');
    })->name('doctor-list');

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

    Route::get('/patient-list', function () {
        return view('admin.patient-list');
    })->name('patient-list');

    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile');

    Route::get('/register', function () {
        return view('admin.register');
    })->name('register');

    Route::get('/reviews', function () {
        return view('admin.reviews');
    })->name('reviews');

    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');

    Route::get('/specialities', function () {
        return view('admin.specialities');
    })->name('specialities');

    Route::get('/tables-basic', function () {
        return view('admin.tables-basic');
    })->name('tables-basic');

    Route::get('/transactions-list', function () {
        return view('admin.transactions-list');
    })->name('transactions-list');
});
