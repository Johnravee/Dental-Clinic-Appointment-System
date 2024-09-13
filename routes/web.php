<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LoginAuth;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckUser;


//============================ AUTH ROUTE ====================================//
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware([CheckUser::class]);


Route::get('/registration', function (){
    return view('auth.register');
})->name('registration')->middleware([CheckUser::class]);

//===========================================================================//


Route::get('/dashboard', function () {
    $authUser = Auth::user();
    return view('dash.dashboard', ['user_data' => $authUser]);
})->middleware(['auth'])->name('dashboard');


Route::get('/auth/redirect', [GoogleAuthController::class, 'redirect'])->name('google-auth');


Route::get('/auth/google/call-back', [GoogleAuthController::class, 'googleCallback']);

Route::get('/', function (){
    $authUser = Auth::user();
    return view('welcome', ['user' => $authUser]);
});

Route::get('/logout', function (Request $request) {
    Auth::logout(); 
    $request->session()->invalidate();
    $request->session()->regenerateToken(); 
    return redirect()->route('login'); 
})->name('logout');


//============================ POST REQUEST ====================================//

Route::post('/r/login', [LoginAuth::class, 'login'])->name('formlogin');

Route::post('/r/register', [RegistrationController::class, 'registrationValidator'])->name('register');