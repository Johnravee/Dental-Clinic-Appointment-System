<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\GoogleAuthCntroller; // Typo in class name
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LoginAuth;
use App\Http\Controllers\LoginAuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\RedirectIfVerified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

// Group routes accessible to guests (not authenticated users)
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login'); // Show login view
    })->name('login');

    Route::get('/registration', function () {
        return view('auth.register'); // Show registration view
    })->name('registration');
});

// Group routes accessible to authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        // Redirect to verification notice if email not verified
        if (Auth::user() && !Auth::user()->email_verified_at) {
            return redirect()->route('verification.notice');
        }
        return view('dash.dashboard', ['user_data' => Auth::user()]); // Show dashboard
    })->name('dashboard');

    Route::get('/profile', function () {
        // Redirect to verification notice if email not verified
        if (Auth::user() && !Auth::user()->email_verified_at) {
            return redirect()->route('verification.notice');
        }
        return view('profile.profile', ['user_data' => Auth::user()]); // Show profile
    })->name('profile');

    Route::get('/book', function () {
        return view('appointments.appointmentbook'); // Show appointment booking view
    })->name('book');

    // Get pending appointments
    Route::get('/pending', [AppointmentController::class, 'pendingAppointments'])->name('pending');

    // Update user information
    Route::patch('/user/update', [UserController::class, 'update'])->name('update');

    // API route to show available slots for a given date
    Route::get('/api/show-slot/{date}', [AppointmentController::class, 'showSlots']);
    
    // API route to get user appointments in JSON format
    Route::get('/api/user-appointments', [AppointmentController::class, 'jsonreqAppointments']);

    // Logout route
    Route::get('/logout', function (Request $request) {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Regenerate CSRF token
        return redirect()->route('login'); // Redirect to login
    })->name('logout');
    
    // Google authentication redirect
    Route::get('/auth/redirect', [GoogleAuthController::class, 'redirect'])->name('google-auth');
    
    // Google authentication callback
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'googleCallback']);

    // Email verification notice view
    Route::get('/email/verify', function () {
        return view('verifyemail.verify-email'); // Show email verification view
    })->middleware(RedirectIfVerified::class)->name('verification.notice');

    // Route to resend email verification notification
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification(); // Send verification link
        return back()->with('message', 'Verification link sent!'); // Show message
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

// POST REQUESTS
Route::post('/r/login', [LoginAuthController::class, 'login'])->name('formlogin'); // Login submission
Route::post('/r/register', [RegistrationController::class, 'registrationValidator'])->name('register'); // Registration submission
Route::post('/api/createappointment', [AppointmentController::class, 'create'])->name('createappointment'); // Create appointment
Route::post('/api/cancel-appointment', [AppointmentController::class, 'cancel'])->name('cancel-appointment'); // Cancel appointment