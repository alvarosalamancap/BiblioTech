<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Ruta para mostrar el formulario de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForm');

// Ruta para procesar el login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Ruta para mostrar el formulario de registro (raíz)
Route::get('/', [AuthController::class, 'registerForm']);

// Ruta para mostrar el formulario de registro
Route::get('register', [AuthController::class, 'registerForm'])->name('registerForm');

// Ruta para procesar el registro
Route::post('register', [AuthController::class, 'register'])->name('register');