<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function googleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->email)->first();
            if($user){
                $user->google_id = $google_user->id;
                $user->update();
                Auth::login($user);

                return redirect()->intended('dashboard');

            }else{
                return redirect()->route('login', ['google_login_failed' => true]);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
