<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function authenticate():RedirectResponse
    {
        $credentials = request()->validate([
            "email" => "required|email:unique",
            // "email" => "required|email:unique|email:rfc,dns",
            'password' => 'required'
        ]);

 
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            // toast("Welcome back " . Auth::user()->name, "success");
            Alert::success("Login successful", "Welcome back " . Auth::user()->name);
            return redirect()->intended('cms/dashboard');
        } else {
            Alert::error("Login failed", "Username or password incorrect");
        }
  
        return back();
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        Request()->session()->invalidate();

        Request()->session()->regenerateToken();
        Alert::success('Logged out', 'Have a nice day.');
        return redirect()->route('login');
    }
}
