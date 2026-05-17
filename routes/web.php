<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Services\FirestoreService;
use PhpParser\Comment\Doc;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Doctor\DoctorProfileController;

Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/', [IndexController::class,'index'])->name('index');
Route::get('/index', [IndexController::class,'index'])->name('index');

Route::middleware(['firebase.auth'])->group(function () {
    Route::get('{id}/booking-slots', [BookingController::class,'bookingSlots'])->name('booking');
    Route::post('/booking/process', [BookingController::class, 'processBooking'])->name('booking.process');
    Route::get('/booking/success', [BookingController::class, 'paymentSuccess'])->name('booking.success');
    Route::get('/booking/cancel', [BookingController::class, 'paymentCancel'])->name('booking.cancel');
    Route::get('/flutterwave/callback', [BookingController::class, 'flutterwaveCallback'])->name('flutterwave.callback');
    Route::get('/appointment-data-demo',[IndexController::class,'appointmentDataDemo']);
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('conversation/{id}/messages', [PatientController::class, 'messages'])->name('conversation.messages');

    Route::prefix('patient')->controller(PatientController::class)->group(function () {
        Route::get('/appointment/{id}/cancel', 'cancelAppointment')->name('patient.cancel-appointment');
        Route::get('/appointment-details/{id}', 'appointmentDetails')->name('patient.appointment-details');
        Route::get('/appointments', 'appointments')->name('patient.appointments');
        Route::get('/dashboard', 'dashboard')->name('patient.dashboard');
        Route::get('/profile', 'profile')->name('patient.settings');
        Route::put('/profile', 'update')->name('patient.settings.update');
        Route::put('/profile/change-password', 'changePassword')->name('patient.settings.changepassword');
        Route::get('/conversations', 'conversations')->name('patient.conversations');
        Route::get('/conversations/{id}/audio-call', 'audioCall')->name('patient.audio-call');
        Route::get('/conversations/{id}/video-call', 'videoCall')->name('patient.video-call');
        Route::get('conversation/{doctor_id}/create', 'createConversation')->name('conversation.create');
        Route::post('conversation/{id}/send','sendMessage');
        Route::get('conversations/{id}','conversations')->name('patient.conversations.show');
        Route::POST('conversation/{id}/mark-read','markRead')->name('patient.conversations.mark-read');
    });

    Route::prefix('doctor')->controller(DoctorProfileController::class)->group(function () {
        Route::get('/appointment/{id}/cancel', 'cancelAppointment')->name('doctor.cancel-appointment');
        Route::get('/appointment-details/{id}', 'appointmentDetails')->name('doctor.appointment-details');
        Route::get('/appointments', 'appointments')->name('doctor.appointments');
        Route::get('/dashboard', 'dashboard')->name('doctor.dashboard');
        Route::get('/', 'dashboard')->name('doctor.dashboard');
        Route::get('/profile', 'profile')->name('doctor.settings');
        Route::post('/profile', 'update')->name('doctor.settings.update');
        Route::put('/profile/change-password', 'changePassword')->name('doctor.settings.changepassword');
        Route::get('/conversations', 'conversations')->name('doctor.conversations');
        Route::get('/available-timings', 'availableTimings')->name('doctor.available-timings');
        Route::post('/update-available', 'updateAvailableTimings')->name('doctor.update-availability');
        Route::get('/conversations/{id}/audio-call', 'audioCall')->name('doctor.audio-call');
        Route::get('/conversations/{id}/video-call', 'videoCall')->name('doctor.video-call');
        Route::get('conversation/{patient_id}/create', 'createConversation')->name('doctor.conversation.create');
        Route::post('conversation/{id}/send', 'sendMessage');
        Route::get('conversations/{id}','conversations')->name('doctor.conversations.show');
        Route::POST('conversation/{id}/mark-read','markRead')->name('doctor.conversations.mark-read');
        Route::get('/payout-setup','payout')->name('doctor.payout');
        Route::get('/setup-payout','setupPayout')->name('doctor.payout-setup');
        Route::get('/setup-complete','payoutComplete')->name('doctor.payout.complete');
    });

});

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors');
Route::get('/doctor-details/{id}', [DoctorController::class, 'show'])->name('doctor-details');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/how-it-works', function () {
    return view('how-it-works');
})->name('how-it-works');

Route::get('/for-patients', function () {
    return view('for-patients');
})->name('for-patients');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password.email');

Route::get('/for-doctors', function () {
    return view('for-doctors');
})->name('for-doctors');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/patient-faqs', function () {
    return view('patient-faq');
})->name('patient-faqs');

Route::get('/patient-reviews', function () {
    return view('patient-reviews');
})->name('patient-reviews');

Route::get('/doctor-reviews', function () {
    return view('doctor-reviews');
})->name('doctor-reviews');

Route::get('/doctor-faqs', function () {
    return view('doctor-faqs');
})->name('doctor-faqs');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/risk-disclaimer', function () {
    return view('refund-policy');
})->name('risk-disclaimer');

Route::get('/terms-conditions', function () {
    return view('terms-conditions');
})->name('terms-conditions');

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/doctor-register', [AuthController::class, 'doctorRegister'])->name('doctor-register');
Route::post('/doctor-register', [AuthController::class, 'registerDoctor'])->name('doctor-register');
Route::post('/patient-register', [AuthController::class, 'registerPatient'])->name('patient-register');
Route::post(
    '/google-patient-register',
    [AuthController::class, 'googlePatientRegister']
)->name('google-patient-register');
Route::get('/terms-condition', function () {
    return view('terms-condition');
})->name('terms-condition');

