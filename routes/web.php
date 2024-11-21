<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordChangeController;

// Ruta para la página principal
Route::get('/', function () { return view('welcome'); })->name('home');

// Ruta para mostrar el formulario de login
Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');

// Ruta para procesar el login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Ruta para mostrar el formulario de registro
Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');

// Ruta para mostrar la vista index
Route::get('/index', function () { return view('index'); })->name('index');

// Ruta para procesar el registro
Route::post('/register', [AuthController::class, 'register'])->name('register');

<<<<<<< HEAD
// Ruta para el cambio de contraseña
Route::get('/change-password', [PasswordChangeController::class, 'showChangePasswordForm'])->name('changePassword');
=======


Route::middleware(['auth'])->group(function () {
    Route::get('/change-password', [PasswordChangeController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [PasswordChangeController::class, 'changePassword'])->name('password.update');
    
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/index', [UserController::class, 'index'])->name('admin.indexAdmin');
    Route::get('/admin/register-user', [UserController::class, 'registerUserForm'])->name('admin.registerUserForm');
    Route::post('/admin/register-user', [UserController::class, 'registerUser'])->name('admin.registerUser');
});

Route::get('/change-password', [PasswordChangeController::class, 'showChangePasswordForm'])->name('password.change');

>>>>>>> b3c8785db30d59d73f32dc8d9d374f172ed7354e
