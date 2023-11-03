<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmailVerificationManager extends Controller
{
    function verifyEmail()
    {
        return view("verify-email");
    }

    function verifyEmailPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);


        $existingRecord = DB::table('users')->where('email', $request->email)->first();

        if ($existingRecord) {
            // If a record already exists, update the token and created_at timestamp
            $token = Str::random(64);
            DB::table('users')
                ->where('email', $request->email)
                ->update([
                    'token' => $token,
                ]);
        } else {
            // If no record exists, insert a new one
            $token = Str::random(64);
            DB::table('verify_users')->insert([
                'email' => $request->email,
                'token' => $token,
            ]);
        }

        Mail::send("emails.email-verify", ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Email Verification");
        });

        return redirect()->to(route("verify.email"))
            ->with("success", "We have sent an email to verify your email.");
    }

}
