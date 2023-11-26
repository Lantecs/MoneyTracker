<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthManager extends Controller
{

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
            'password' => 'required|min:8',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            $token = $user->createToken($user->email)->plainTextToken;

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

        $data['verification_token'] = Str::random(40);

        $user = User::create($data);

        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration failed, try again.");
        }

        Mail::send("emails.verify_email", ['token' => $data['verification_token']], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Verify Email");
        });

        return redirect(route('login'))->with("success", "Registration Success! We have sent a link to verify your email.");

    }

    public function verifyPost($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect()->route("login")->with("error", "Email verification failed. Token not found.");
        }

        // Check if the user is already verified
        if ($user->email_verified) {
            return redirect()->route("login")->with("error", "Email has already been verified.");
        }

        // Mark the user's email as verified
        $user->email_verified = true;
        $user->email_verified_at = now();
        $user->save();

        return redirect()->route("login")->with("success", "Email Successfully Verified!");
    }

    function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        $request->session()->regenerateToken();
        $request->session()->invalidate();
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }
}
