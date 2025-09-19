<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //
    public function logout(Request $request)
    {
        Auth::logout();
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('web.auth.login')->with([
                    'flash_message' => [
                        [
                            'type' => 'success',
                            'title' => 'Successful',
                            'message' => 'erhasil Logout'
                        ]
                    ]
                ]);
    }
}
