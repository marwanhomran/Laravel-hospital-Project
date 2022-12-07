<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Psy\Util\Str;
use function GuzzleHttp\Promise\rejection_for;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('password.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = \Illuminate\Support\Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        $action_link = route('reset-password-form', ['token' => $token, 'email' => $request->email]);
        $body = 'reset the password of ' . $request->email;

        Mail::send('password.email-forgot', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
            $message->from('marwan@example.com', 'Laravel');
            $message->to($request->email, 'marwan@example.com')->subject('reset password');
        });

        return back()->with('success', 'check your email address');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('password.reset-password')->with(['token' => $token, 'email' => $request->email]);

    }

    public function resetPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:7|max:255|required_with:password_confirmation|same:password_confirmation',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$check_token) {
            return back()->with('fail', 'Invalid token');
        } else {
            User::where('email', $request->email)->update([
               'password'=>Hash::make($request->password)
            ]);
        }

        DB::table('password_resets')->where([
            'email' => $request->email
        ])->delete();

        return redirect('/login')->with('success', 'Your password updated successfully');

    }
}
