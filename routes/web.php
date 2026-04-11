<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Services\FirestoreService;
use PhpParser\Comment\Doc;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\PatientController;

Broadcast::routes();
require base_path('routes/channels.php');
Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/', [IndexController::class,'index'])->name('index');
Route::prefix('doctors')->controller(DoctorController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'delete');
});

Route::middleware(['firebase.auth'])->prefix('patient')->controller(PatientController::class)->group(function () {
    Route::get('/dashboard', 'profile');
    Route::get('/', 'profile');
    Route::put('/', 'update');
});

Route::get('/doctor-details/{id}', [DoctorController::class, 'show']);

Route::get('/index', function () {
    return view('index');
})->name('index');


Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/accounts', function () {
    return view('accounts');
})->name('accounts');

Route::get('/appointments', function () {
    return view('appointments');
})->name('appointments');

Route::get('/available-timings', function () {
    return view('available-timings');
})->name('available-timings');

Route::get('/blank-page', function () {
    return view('blank-page');
})->name('blank-page');

Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');

Route::get('/blog-grid', function () {
    return view('blog-grid');
})->name('blog-grid');

Route::get('/blog-list', function () {
    return view('blog-list');
})->name('blog-list');

Route::get('/booking-1', function () {
    return view('booking-1');
})->name('booking-1');

Route::get('/booking-2', function () {
    return view('booking-2');
})->name('booking-2');

Route::get('/booking-popup', function () {
    return view('booking-popup');
})->name('booking-popup');

Route::get('/booking-success-one', function () {
    return view('booking-success-one');
})->name('booking-success-one');

Route::get('/booking-success', function () {
    return view('booking-success');
})->name('booking-success');

Route::get('/booking', function () {
    return view('booking');
})->name('booking');

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/change-password', function () {
    return view('change-password');
})->name('change-password');

Route::get('/chat-doctor', function () {
    return view('chat-doctor');
})->name('chat-doctor');

Route::get('/chat', function () {
    return view('chat');
})->name('chat');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/clinic', function () {
    return view('clinic');
})->name('clinic');

Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');

Route::get('/components', function () {
    return view('components');
})->name('components');

Route::get('/consultation', function () {
    return view('consultation');
})->name('consultation');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::get('/delete-account', function () {
    return view('delete-account');
})->name('delete-account');

Route::get('/dependent', function () {
    return view('dependent');
})->name('dependent');


Route::get('/edit-blog', function () {
    return view('edit-blog');
})->name('edit-blog');

Route::get('/email-otp', function () {
    return view('email-otp');
})->name('email-otp');

Route::get('/error-404', function () {
    return view('error-404');
})->name('error-404');

Route::get('/error-500', function () {
    return view('error-500');
})->name('error-500');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/favourites', function () {
    return view('favourites');
})->name('favourites');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

Route::get('/forgot-password2', function () {
    return view('forgot-password2');
})->name('forgot-password2');

Route::get('/hospitals', function () {
    return view('hospitals');
})->name('hospitals');

Route::get('/invoice-view', function () {
    return view('invoice-view');
})->name('invoice-view');

Route::get('/invoices', function () {
    return view('invoices');
})->name('invoices');

Route::get('/login-email-otp', function () {
    return view('login-email-otp');
})->name('login-email-otp');

Route::get('/login-email', function () {
    return view('login-email');
})->name('login-email');

Route::get('/login-phone-otp', function () {
    return view('login-phone-otp');
})->name('login-phone-otp');

Route::get('/login-phone', function () {
    return view('login-phone');
})->name('login-phone');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/maintenance', function () {
    return view('maintenance');
})->name('maintenance');

Route::get('/map-grid', function () {
    return view('map-grid');
})->name('map-grid');

Route::get('/map-list-availability', function () {
    return view('map-list-availability');
})->name('map-list-availability');

Route::get('/map-list', function () {
    return view('map-list');
})->name('map-list');

Route::get('/medical-details', function () {
    return view('medical-details');
})->name('medical-details');

Route::get('/medical-records', function () {
    return view('medical-records');
})->name('medical-records');

Route::get('/mobile-otp', function () {
    return view('mobile-otp');
})->name('mobile-otp');

Route::get('/my-patients', function () {
    return view('my-patients');
})->name('my-patients');

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

Route::get('/payment-success', function () {
    return view('payment-success');
})->name('payment-success');

Route::get('/payment', function () {
    return view('payment');
})->name('payment');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/product-all', function () {
    return view('product-all');
})->name('product-all');

Route::get('/product-checkout', function () {
    return view('product-checkout');
})->name('product-checkout');

Route::get('/product-description', function () {
    return view('product-description');
})->name('product-description');

Route::get('/profile-settings', function () {
    return view('profile-settings');
})->name('profile-settings');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/reset-password', function () {
    return view('reset-password');
})->name('reset-password');

Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');

Route::get('/search-2', function () {
    return view('search-2');
})->name('search-2');

Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/signup-success', function () {
    return view('signup-success');
})->name('signup-success');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/social-media', function () {
    return view('social-media');
})->name('social-media');

Route::get('/speciality', function () {
    return view('speciality');
 })->name('speciality');

Route::get('/terms-condition', function () {
    return view('terms-condition');
})->name('terms-condition');

Route::get('/two-factor-authentication', function () {
    return view('two-factor-authentication');
 })->name('two-factor-authentication');

Route::get('/video-call', function () {
    return view('video-call');
})->name('video-call');

Route::get('/voice-call', function () {
    return view('voice-call');
})->name('voice-call');
