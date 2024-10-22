<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginAuthController
{
    public function login(Request $request){

        
   $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


       $user = User::where('email', $credentials['email'])->first();
        

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
            
     
        Auth::login($user, $remember = true);
        
        
        return redirect()->intended('dashboard')->with('user_data', Auth::user());
    
    
    }
}