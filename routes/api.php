<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductController;
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


    
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/produtos', [ProductController::class, 'store']);
Route::get('/produtos', [ProductController::class, 'index']);
});
