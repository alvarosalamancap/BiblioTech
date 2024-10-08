<?php
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Ruta para mostrar el formulario de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('loginForm');

// Ruta para procesar el login
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');


Route::get('/', function () {
    return view('welcome');
});
