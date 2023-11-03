<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;

class AuthManager extends Controller
{

<<<<<<< HEAD
=======

>>>>>>> lanbert
    function login()
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }

        return view('login');

    }

    function registration()
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('registration');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required | min:8',
            'g-recaptcha-response' => 'required|captcha',

        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard'));
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'min:8|max:255|required|confirmed',
            'password_confirmation' => 'min:8|max:255|required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration failed, try again.");
        }


    return redirect(route('login'))->with("success", "Registration success, Check your email for verification instructions.");

    }

    function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }
}
