<?php

namespace App\Http\Controllers\Developer\Auth;

use App\Models\Developer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DeveloperLoginController extends Controller
{
    public function index()
    {
        return view('developer.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('developer')->attempt($credentials, $request->has('remember-me'))) {
            $request->session()->regenerate();

            return redirect()->route('projects.index');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('developer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have logged out.');
    }

    public function register()
    {
        return view('developer.auth.register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:developers,username',
            'email' => 'required|email|unique:developers,email',
            'phone' => 'required',
            'password' => 'required|min:6',
            'confirm-password' => 'required|same:password',
        ]);

        $developer = Developer::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Developer registered successfully');
    }
}
