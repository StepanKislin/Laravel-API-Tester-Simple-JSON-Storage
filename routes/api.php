<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;



Route::get('/test', function () {
    return response()->json(['status' => 'ok', 'message' => 'API is working'], 200);
});

Route::get('/users', [UserController::class, 'index']);       // GET - получить список
Route::post('/users', [UserController::class, 'store']);      // POST - создать пользователя
Route::delete('/users', [UserController::class, 'destroy']);  // DELETE - очистить все

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});