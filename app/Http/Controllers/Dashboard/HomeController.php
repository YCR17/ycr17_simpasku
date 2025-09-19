<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Library\Api\ApiRequest;
use App\Library\Api\ApiResponse;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = User::all();
        $data = [
            'total_staff' => $user->count() ?? 0,
        ];
        return view('pages.dashboard.home', $data);
    }
}
