<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/vue-login', function () {
    return view('login');
});
Route::get('/vregister', function () {
    return view('register');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::post('/vue-login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index']);
Route::get('/login/create', [App\Http\Controllers\LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store']);
Route::get('/login/{id}/edit', [LoginController::class, 'edit']);
Route::put('/login/{id}', [LoginController::class, 'update']);
Route::delete('/login/{id}', [LoginController::class, 'destroy']);