<?php

use App\Http\Controllers\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/chats', [ChatController::class, 'index']);
Route::post('/chats', [ChatController::class, 'store']);
Route::delete('/chats/{id}', [ChatController::class, 'destroy']);
Route::post('/chats/{id}/like', [ChatController::class, 'like'])->name('chats.like');
