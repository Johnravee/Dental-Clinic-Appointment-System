<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class GoogleAuthController 
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
         
            $user = User::where('google_id', $googleUser->id)
                        ->orWhere('email', $googleUser->email)
                        ->first();
                        
            if (!$user) {
               
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                ]);
            }

            

        
            Auth::login($user);
            
            $user_data = [
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->google_id
            ];

 
            return redirect()->intended('dashboard')->with('user_data', $user_data);

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}