<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class AuthLoginController extends Controller
{
    public function google()
    {
        if (Auth::user()) {
            return view('welcome');
        } else {
            return view('googleAuth');
        }
    }

    public function redirectToGoogle($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleGoogleCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
            switch ($driver) {
                case ("google"):
                    $loginId = 'google_id';
                    break;
                case ("github"):
                    $loginId = 'github_id';
                    break;

                default:
                    $msg = 'Something went wrong.';
            }
            $finduser = User::where($loginId, $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('home');
            } else {
                $newUser = User::create([
                    'name' => isset($user->name) ? $user->name : $user->nickname,
                    'email' => $user->email,
                    'google_id' => $driver == "google" ? $user->id : null,
                    'github_id' => $driver == "github" ? $user->id : null,
                    'facebook_id' => null,
                    'linkedIn_id' => null,
                    'password' => Hash::make('12345678'),
                ]);
                Auth::login($newUser);
                return redirect()->route('home');
            }
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect('auth/google');
        }
    }
}
