<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Library\Api\ApiRequest;
use App\Http\Controllers\Controller;

class PasienController extends Controller
{
    //
    public function index(Request $request) {
        return view('pages.dashboard.pasien');
    }
}
