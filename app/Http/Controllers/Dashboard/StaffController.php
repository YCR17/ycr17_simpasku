<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    //

    public function index(Request $request)
    {
        $staffs = User::filters(request(['search', 'role']))
            ->paginate(10)->withQueryString();
        return view('pages.dashboard.staff.index', [
            "staffs" => $staffs,
            'pagination' => $staffs->toArray(),
        ]);
    }

    public function create(Request $request)
    {
        return view('pages.dashboard.staff.create');
    }

    public function post_create(Request $request)
    {
        $data = $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:800', // max dalam kilobytes
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
            ],
            'role' => 'required'
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

        $data['password'] = Hash::make($data['password']);
        unset($data['confirm_password']);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatar', 'public');
            // simpan path ke database user
            $fileName = basename($path);
            $data['avatar'] = $fileName;
        }

        $create = User::create($data);
        if ($create) {
            return redirect('dashboard/staff')->with([
                'flash_message' => [
                    [
                        'type' => 'success',
                        'title' => 'Successful',
                        'message' => 'Data staff telah berhasil ditambahkan.'
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

    public function detail(Request $request, $id)
    {
        $user = User::where('id', $id)->get()->first();

        if (!$user) {
            return redirect('dashboard/staff')->with([
                'flash_message' => [
                    [
                        'type' => 'error',
                        'title' => 'Staff Not Found',
                        'message' => 'Data staff yang Anda akses tidak tersedia'
                    ]
                ]
            ]);
        }

        if (auth()->user()->id == $user->id) {
            return redirect('dashboard/account');
        }

        $data = [
            'staff' => $user
        ];
        return view('pages.dashboard.staff.detail', $data);
    }

    public function edit(Request $request, $id)
    {
        $user = User::where('id', $id)->get()->first();

        if (!$user) {
            return redirect('dashboard/staff')->with([
                'flash_message' => [
                    [
                        'type' => 'error',
                        'title' => 'Staff Not Found',
                        'message' => 'Data staff yang Anda akses tidak tersedia'
                    ]
                ]
            ]);
        }

        if (auth()->user()->id == $user->id) {
            return redirect('dashboard/account');
        }

        $data = [
            'staff' => $user
        ];
        return view('pages.dashboard.staff.edit', $data);
    }

    public function post_edit(Request $request, $id)
    {
        $user = User::where('id', $id)->get()->first();

        if (!$user) {
            return redirect('dashboard/staff')->with([
                'flash_message' => [
                    [
                        'type' => 'error',
                        'title' => 'Staff Not Found',
                        'message' => 'Data staff yang Anda akses tidak tersedia'
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
            ],
            'role' => 'required'
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
            return redirect('dashboard/staff')->with([
                'flash_message' => [
                    [
                        'type' => 'success',
                        'title' => 'Successful',
                        'message' => 'Data staff telah berhasil diedit.'
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

    public function delete(Request $request)
    {
        $id = $request->input('id');

        if (!isset($id)) {
            return redirect('dashboard/staff')->with([
                'flash_message' => [
                    [
                        'type' => 'error',
                        'title' => 'Id Nulled',
                        'message' => 'Id tidak ada'
                    ]
                ]
            ]);
        }

        if ($id == auth()->user()->id) {
            return redirect('dashboard/staff')->with([
                'flash_message' => [
                    [
                        'type' => 'error',
                        'title' => 'Cannot Self Delete',
                        'message' => 'Tidak bisa menghapus akun sendiri'
                    ]
                ]
            ]);
        }

        $user = User::where('id', $id)->get()->first();

        if (!$user) {
            return redirect('dashboard/staff')->with([
                'flash_message' => [
                    [
                        'type' => 'error',
                        'title' => 'Staff Not Found',
                        'message' => 'Data staff yang Anda akses tidak tersedia'
                    ]
                ]
            ]);
        }
        $avatar = $user->avatar;

        if ($user->delete()) {

            if ($avatar !== 'default.jpg') {
                Storage::disk('public')->delete('avatar/' . $avatar);
            }
            return redirect('dashboard/staff')->with([
                'flash_message' => [
                    [
                        'type' => 'success',
                        'title' => 'Staff Deleted',
                        'message' => 'Data staff telah berhasil dihapus'
                    ]
                ]
            ]);
        }

        return redirect('dashboard/staff')->with([
            'flash_message' => [
                [
                    'type' => 'error',
                    'title' => 'Failed to delete staff',
                    'message' => 'terjadi kesalahan ketika mencoba menghapus staff'
                ]
            ]
        ]);
    }
}
