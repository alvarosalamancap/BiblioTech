<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Ruta para mostrar el formulario de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForm');

// Ruta para procesar el login
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');


Route::get('/', function () {
    return view('welcome');
});
