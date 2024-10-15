<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LoginAuth;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserAppointments;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\RedirectIfVerified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;






Route::middleware('auth')->group(function () {
    
    Route::get('/login', function () {
         return view('auth.login');
    })->name('login')->middleware(CheckUser::class);


    Route::get('/registration', function (){
        return view('auth.register');
    })->name('registration')->middleware(CheckUser::class);;


    Route::get('/dashboard', function () {

        if (Auth::user() && !Auth::user()->email_verified_at) {
            return redirect()->route('verification.notice');
        }
        return view('dash.dashboard', ['user_data' => Auth::user()]);
    })->name('dashboard');


    Route::get('/profile', function (){
        if (Auth::user() && !Auth::user()->email_verified_at) {
            return redirect()->route('verification.notice');
        }
        return view('profile.profile', ['user_data' => Auth::user()]); 
    })->name('profile');

  
    Route::get('/book', function() {
        return view('appointments.appointmentbook');
    })->name('book');


    //*Update user informations
    Route::patch('/user/update', [UserController::class, 'update'])->name('update');


    
});









Route::get('/logout', function (Request $request) {
    Auth::logout(); 
    $request->session()->invalidate();
    $request->session()->regenerateToken(); 
    return redirect()->route('login'); 
})->name('logout');




Route::get('/auth/redirect', [GoogleAuthController::class, 'redirect'])->name('google-auth');

Route::get('/auth/google/call-back', [GoogleAuthController::class, 'googleCallback']);

Route::get('/email/verify', function () {    return view('verifyemail.verify-email');})->middleware(['auth', RedirectIfVerified::class])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {    $request->fulfill();    return redirect('/dashboard');})->middleware(['auth','signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');





//============================ POST REQUEST ====================================//

Route::post('/r/login', [LoginAuth::class, 'login'])->name('formlogin');

Route::post('/r/register', [RegistrationController::class, 'registrationValidator'])->name('register');





Route::post('/api/createappointment', [AppointmentController::class, 'create'])->name('createappointment');
Route::get('api/show-slot/{date}', action: [AppointmentController::class, 'showSlots']);