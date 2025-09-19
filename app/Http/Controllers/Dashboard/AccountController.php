<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    //
        public function edit(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('dashboard')->with([
                'flash_message' => [
                    [
                        'type' => 'error',
                        'title' => 'Not Found',
                        'message' => 'Data yang Anda akses tidak tersedia'
                    ]
                ]
            ]);
        }

        $data = [
            'user' => $user
        ];
        return view('pages.dashboard.account.edit', $data);
    }

    public function post_edit(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('dashboard')->with([
                'flash_message' => [
                    [
                        'type' => 'error',
                        'title' => 'Not Found',
                        'message' => 'Data yang Anda akses tidak tersedia'
                    ]
                ]
            ]);
        }

        $data = $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:800', // max dalam kilobytes
            'fullname' => 'required',
            'email' => [
                'required',
                function ($attribute, $value, $fail) {
                    // kalau input email
                    if (!str_ends_with($value, '@pkuwsb.id')) {
                        $fail('Hanya email dengan @pkuwsb.id yang diperbolehkan.');
                    }
                }
            ],
            'password' => [
                'nullable',
                'string',
                'min:7',
                'regex:/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{7,}$/',
            ],
            'confirm_password' => [
                'nullable',
                'same:password',
            ]
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, dan angka.',
            'password.min' => 'Password minimal 7 karakter.',
            'confirm_password.same' => 'Konfirmasi password tidak cocok.',
        ]);

        // Logika tambahan
        if (empty($data['password'])) {
            unset($data['password'], $data['confirm_password']);
        } else {
            $data['password'] = Hash::make($data['password']); // atau Hash::make()
            unset($data['confirm_password']); // tidak perlu disimpan
        }

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatar', 'public');
            // simpan path ke database user
            $fileName = basename($path);
            $data['avatar'] = $fileName;
            if ($user->avatar !== 'default.jpg') {
                Storage::disk('public')->delete('avatar/' . $user->avatar);
            }
        }

        $create = $user->update($data);
        if ($create) {
            return redirect('dashboard/account')->with([
                'flash_message' => [
                    [
                        'type' => 'success',
                        'title' => 'Successful',
                        'message' => 'Data telah berhasil diedit.'
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
