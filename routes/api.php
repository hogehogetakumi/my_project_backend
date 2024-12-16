<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\signup\SignupController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/signup', [SignupController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('user', [AuthController::class, 'user']);
Route::middleware('auth:api')->get('protected', function () {
    return response()->json(['message' => 'You are authenticated']);
});