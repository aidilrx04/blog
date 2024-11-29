<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register_view()
    {
        return view('auth.register');
    }

    public function login_view()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        // create user
        $user = User::create([
            'email' => $validated['email'],
            'name' => $validated['name'],
            'password' => Hash::make($validated['password'])
        ]);

        // login user
        Auth::login($user);

        return redirect()->route('index');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|string'
        ]);

        // attemp
        if (Auth::attempt($validated)) {
            return redirect()->route('index');
        }

        return back()->withInput()->withErrors([
            'failed' => 'Invalid email/password'
        ]);
    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('auth.login');
    }
}
