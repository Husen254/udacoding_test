<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt login using email and password
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('staff.index')->with('success', 'Login berhasil.');
        }

        // Return error if login fails
        return back()->withErrors(['email' => 'Email atau Password salah.']);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'id_library' => 'required|string|unique:users,id_library',
            'password' => 'required|string|min:8',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create([
            'name' => $request->name,
            'id_library' => $request->id_library,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }

}
