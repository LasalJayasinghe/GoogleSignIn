<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Exception;

class GoogleLogin extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $findUser = User::where('google_id', $user->id)->first();
    
            if ($findUser) {
                Auth::login($findUser);
                return redirect('/old');
            } 
            else {
                User::create([
                    'google_id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    
                ]);
    
                return redirect('/new');
            }
    
        } catch (Exception $e) {
            // Handle the exception, e.g., log the error
            Log::error($e->getMessage());
            return redirect('/home');
            
        }
    }
    
    
}
