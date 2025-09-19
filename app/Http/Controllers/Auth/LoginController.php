<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('pages.auth.login');
    }

    public function post_login(Request $request)
    {
        $data = $request->validate([
            'username' => [
                'required',
                function ($attribute, $value, $fail) {
                    // kalau input email
                    if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        if (!str_ends_with($value, '@pkuwsb.id')) {
                            $fail('Hanya email dengan @pkuwsb.id yang diperbolehkan.');
                        }
                    } else {
                        // kalau username biasa → validasi pattern
                        if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $value)) {
                            $fail('Username hanya boleh huruf, angka, dan underscore (3–20 karakter).');
                        }
                    }
                }
            ],
            'password' => 'required'
        ]);

        $loginField = filter_var($data['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginField => $data['username'],
            'password' => $data['password'],
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with([
                    'flash_message' => [
                        [
                            'type' => 'success',
                            'title' => 'Selamat datang',
                            'message' => 'di Sistem Manajemen Pasien'
                        ]
                    ]
                ]);
        }

        return back()->with([
            'flash_message' => [
                [
                    'type' => 'error',
                    'title' => 'Login Error',
                    'message' => 'Login Error, failed.'
                ]
            ]
        ]);
    }
}

