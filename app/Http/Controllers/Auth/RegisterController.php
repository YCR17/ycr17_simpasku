<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function register(Request $request)
    {
        return view('pages.auth.register');
    }

    public function post_register(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required',
            'email' => [
                'required',
                'unique:users,email',
                function ($attribute, $value, $fail) {
                    // kalau input email
                    if (!str_ends_with($value, '@pkuwsb.id')) {
                        $fail('Hanya email dengan @pkuwsb.id yang diperbolehkan.');
                    }
                }
            ],
            'username' => [
                'required',
                'unique:users,username',
                'string',
                'min:5',
                'max:30',
                'regex:/^(?![._])(?!.*[._]{2})[a-zA-Z0-9._]+(?<![._])$/'
            ],
            'password' => [
                'required',
                'string',
                'min:7',
                'regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{7,}$/',
            ],
            'confirm_password' => [
                'required',
                'same:password',
            ]
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, dan angka.',
            'password.min' => 'Password minimal 7 karakter.',
            'confirm_password.same' => 'Konfirmasi password tidak cocok.',
            'username.required' => 'Username wajib diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.min' => 'Username minimal 5 karakter.',
            'username.max' => 'Username maksimal 30 karakter.',
            'username.regex' => 'Username hanya boleh huruf, angka, titik atau underscore, tidak boleh diawali atau diakhiri dengan titik/underscore, dan tidak boleh memiliki dua titik/underscore berurutan.',
        ]);

        $password = $data['confirm_password'];
        $data['password'] = Hash::make($data['password']);
        unset($data['confirm_password']);

        $create = User::create($data);
        if ($create) {
            $credentials = [
                'email' => $data['email'],
                'password' => $password,
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

            return redirect('auth/login')->with([
                'flash_message' => [
                    [
                        'type' => 'success',
                        'title' => 'Successful',
                        'message' => 'Silahkan login menggunakan akun yang telah didaftarkan'
                    ]
                ]
            ]);
        }

        return back()->with([
            'flash_message' => [
                [
                    'type' => 'error',
                    'title' => 'Error',
                    'message' => 'terjadi kesalahan.'
                ]
            ]
        ]);
    }
}
