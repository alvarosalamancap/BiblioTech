<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm(){
        try {
            return view('login');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function registerForm(){
        try {
            // Muestra la vista del formulario de registro
            return view("register");
        } catch (\Exception $e) {
            // En caso de excepción, redirige a la página anterior con un mensaje de error
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function register(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'rut' => [
                'required',
                'string',
                'max:10',
                'regex:/^\d{7,8}-[0-9K]$/', // Valida el formato 11111111-1 o 1111111-K
            ],
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Crear el usuario
        $user = new User();
        $user->rut = $request->input('rut');
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 'user'; // Ajusta según tu lógica
        $user->register_date = now();
        $user->save();
    
        // Redirigir a la página de inicio de sesión o cualquier otra página
        return redirect()->route('loginForm')->with('success', 'Registro exitoso. Puedes iniciar sesión.');
    }
}
