<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
 public function index()
 {
    if ($user = Auth::user()) {
        if ($user->role == 'admin') {
            return redirect()->intended('home');
        }elseif ($user->role == 'user'){
            return redirect()->intended('homeuser');
        }
    }
    return view('auth.login',[
        'title' => "Login"
    ]);
 }

public function proses(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $kredensial = $request->only('username', 'password');

    if (Auth::attempt($kredensial)) {
        $request->session()->regenerate();
        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect()->intended('home');
        }elseif ($user->role == 'user'){
            return redirect()->intended('homeuser');
        }
        return redirect()->intended('/login');
    }

    return back()->withErrors([
        'username' => 'username or password incorect',
    ])->onlyInput('username');

}

public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
}

}

