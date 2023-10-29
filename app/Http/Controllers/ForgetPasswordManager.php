<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordManager extends Controller
{
    function forgetPassword()
    {
        return view("forget-password");
    }

    function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);


        $existingRecord = DB::table('password_resets')->where('email', $request->email)->first();

        if ($existingRecord) {
            // If a record already exists, update the token and created_at timestamp
            $token = Str::random(64);
            DB::table('password_resets')
                ->where('email', $request->email)
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now(),
                ]);
        } else {
            // If no record exists, insert a new one
            $token = Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        }

        Mail::send("emails.forget-password", ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        return redirect()->to(route("forget.password"))
            ->with("success", "We have sent an email to reset the password.");
    }

    function resetPassword($token)
    {
        return view("new-password", compact('token'));
    }

    function resetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'email|required|exists:users',
            'password' => 'min:8|max:255|required|confirmed',
            'password_confirmation' => 'min:8|max:255|required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                "email" => $request->email,
                "token" => $request->token,
            ])->first();

        if (!$updatePassword) {
            return redirect()->route("reset.password")->with("error", "Invalid");
        }

        User::where("email", $request->email)
            ->update(["password" => Hash::make($request->password)]);

        // Correct the syntax for the DELETE statement
        DB::table("password_resets")
            ->where("email", $request->email)
            ->delete();

        return redirect()->route("login")->with("success", "Password reset success");
    }

}


