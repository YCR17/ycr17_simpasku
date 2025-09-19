<?php

use App\Http\Controllers\Api\PasienController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('test', function () {
    return 'hello';
});

// Route::middleware('api.auth')->group(function () {
    Route::get('pasien', [PasienController::class, 'index']);
    Route::post('pasien', [PasienController::class, 'create']);
    Route::get('pasien/{id}', [PasienController::class, 'detail']);
    Route::post('pasien/{id}', [PasienController::class, 'edit']);
    Route::delete('pasien/{id}', [PasienController::class, 'delete']);
// });