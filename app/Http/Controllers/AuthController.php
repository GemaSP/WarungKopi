<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('backend.v_auth.index', [
            'judul' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak terdaftar',
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('backend/dashboard')->with('success', 'Anda Berhasil Login');
        }

        return back()->withErrors([
            'password' => 'Password salah',
        ])->onlyInput('email');
    }

    public function showRegistrasi()
    {
        return view('backend.v_auth.registrasi', [
            'judul' => 'Registrasi'
        ]);
    }

    public function storeRegistrasi(Request $request)
    {
        $data = $request->validate(
            [
                'nama' => ['required', 'string', 'max:255', 'unique:user'],
                'email' => ['required', 'email', 'unique:user'],
                'password' => ['required', 'confirmed'],
            ],
            [
                'nama.unique' => 'Nama sudah terdaftar',
                'email.unique' => 'Email sudah terdaftar',
                'password.confirmed' => 'Password tidak sama',
            ]
        );

        $data['role'] = '0';
        $data['status'] = 1;
        $data['hp'] = '085812345671';
        $data['foto'] = 'default.jpg';
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('backend/login')->with('success', 'Registrasi Berhasil, Silahkan Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('backend/login')->with('success', 'Anda Berhasil Logout');
    }
}
