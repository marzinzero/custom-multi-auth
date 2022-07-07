<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\Sendmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    public function index()
    {
        return view('auth.passwordreset.forgot_password_form');
    }

    public function passwordresetlink(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users,email',
            ],
            [
                'email.exists' => 'Email do not exists in our records'
            ]
        );

        $email = $request->email;
        $token = Str::random(64);

        $resetlink = DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        if (!$resetlink) {
            return redirect()->back()->withInput()->with('error', 'Credentials do not match our records');
        } else {
            Mail::to($email)->send(new Sendmail($email, $token));
            return redirect()->back()->with('success', 'Successfully send password reset link');;
        }
    }

    public function passwordresetform(Request $request, $token = null)
    {
        $email = $request->email;
        return view('auth.passwordreset.reset_password_form', compact('token', 'email'));
    }

    public function passwordreset(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:15|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$check) {
            return redirect()->back()->with('error', 'Invalid token');
        } else {

            User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email' => $request->email,
                'token' => $request->token,
            ])->delete();

            return redirect()->route('admin.login.form')->with('success', 'Successfullly reset password login your new password');
        }
    }
}
