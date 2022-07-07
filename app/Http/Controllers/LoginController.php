<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        $remember = $request->boolean('remember');

        $login = Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember);

        if (!$login) {
            return redirect()->back()->withInput()->with('error', 'Credentials do not match our records');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
}
