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
    Route::post('conversation/{id}/send', [PatientController::class, 'sendMessage']);


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
       
    });

});
Route::prefix('doctors')->controller(DoctorController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'delete');
});

Route::get('/doctor-details/{id}', [DoctorController::class, 'show']);

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');


Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');


Route::get('/edit-blog', function () {
    return view('edit-blog');
})->name('edit-blog');

Route::get('/onboarding-availability', function () {
    return view('onboarding-availability');
})->name('onboarding-availability');

Route::get('/onboarding-consultation', function () {
    return view('onboarding-consultation');
})->name('onboarding-consultation');

Route::get('/onboarding-cost', function () {
    return view('onboarding-cost');
})->name('onboarding-cost');

Route::get('/onboarding-email-otp', function () {
    return view('onboarding-email-otp');
})->name('onboarding-email-otp');

Route::get('/onboarding-email-step-2-verify', function () {
    return view('onboarding-email-step-2-verify');
})->name('onboarding-email-step-2-verify');

Route::get('/onboarding-email', function () {
    return view('onboarding-email');
})->name('onboarding-email');

Route::get('/onboarding-identity', function () {
    return view('onboarding-identity');
})->name('onboarding-identity');

Route::get('/onboarding-lock', function () {
    return view('onboarding-lock');
})->name('onboarding-lock');

Route::get('/onboarding-password', function () {
    return view('onboarding-password');
})->name('onboarding-password');

Route::get('/onboarding-payments', function () {
    return view('onboarding-payments');
})->name('onboarding-payments');

Route::get('/onboarding-personalize', function () {
    return view('onboarding-personalize');
})->name('onboarding-personalize');

Route::get('/onboarding-phone-otp', function () {
    return view('onboarding-phone-otp');
})->name('onboarding-phone-otp');

Route::get('/onboarding-phone', function () {
    return view('onboarding-phone');
})->name('onboarding-phone');

Route::get('/onboarding-preferences', function () {
    return view('onboarding-preferences');
})->name('onboarding-preferences');

Route::get('/onboarding-verification', function () {
    return view('onboarding-verification');
})->name('onboarding-verification');

Route::get('/onboarding-verify-account', function () {
    return view('onboarding-verify-account');
})->name('onboarding-verify-account');


Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/doctor-register', [AuthController::class, 'doctorRegister'])->name('doctor-register');
Route::post('/doctor-register', [AuthController::class, 'registerDoctor'])->name('doctor-register');
Route::get('/terms-condition', function () {
    return view('terms-condition');
})->name('terms-condition');


