<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\View;
use App\Models\Distrito;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::post('/users/{id}/delete', [UserController::class, 'delete'])->name('users.delete');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/bitacora', [\App\Http\Controllers\BitacoraController::class, 'index'])->name('bitacora.index');
    Route::get('/catastro', function () {
        return view('catastro');
    })->name('catastro');
});

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

View::composer('register', function ($view) {
    $view->with('distritos', Distrito::where('estado', 1)->get());
});
