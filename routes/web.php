<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthNewController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('register', [AuthNewController::class, 'test']);
Route::prefix('v1')->group(function () {
    Route::get('test', function () {
        return response()->json([
            'message' => 'Test API v1 working!',
        ]);
    });

    // Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::get('profile', [ProfileController::class, 'show'])->middleware('auth:api');
    Route::post('profile', [ProfileController::class, 'update'])->middleware('auth:api');
    Route::delete('profile', [ProfileController::class, 'delete'])->middleware('auth:api');


});
