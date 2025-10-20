<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']); // admin vai usar
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // exemplo rota protegida
    Route::get('/me', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
            'roles' => $request->user()->roles()->pluck('name'),
        ]);
    });
});
