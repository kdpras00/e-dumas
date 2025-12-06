<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|numeric|unique:users,nik',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'alamat' => 'required|string',
            'rt_id' => 'required|exists:rt,id',
            'no_hp' => 'required|numeric',
            'password' => 'required|min:6',
        ]);

        // Explicitly set user level to 1 (Masyarakat/Warga) for public registration
        // Based on DashboardController logic: 1=Masyarakat, 2=Petugas, 3=Admin, 4=Kepala
        $wargaLevelId = 1;

        \App\Models\User::create([
            'nik' => $validated['nik'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'alamat' => $validated['alamat'],
            'rt_id' => $validated['rt_id'],
            'no_hp' => $validated['no_hp'],
            'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
            'user_level_id' => $wargaLevelId, 
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan login.');
    }
}
