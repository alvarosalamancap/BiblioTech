<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        return response()
        ->view('login')
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
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

    function makeMessagesRegister(){
    
        return [
            'rut.required' => 'El campo RUT es obligatorio.',
            'name.required' => 'El campo nombre es obligatorio.',
            'lastname.required' => 'El campo apellido es obligatorio.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'phone.required' => 'El campo teléfono es obligatorio.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'email.email' => 'El correo electronico ingresado no es válido.',
            'email.unique' => 'El correo ingresado ya está en uso.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'role.required' => 'Debe seleccionar un rol.',
            'rut.regex' => 'El RUT es válido.',
            'rut.unique' => 'El RUT ingresado ya está en uso.',
            'phone.regex' => 'El teléfono movil ingresado no es válido.',
            'phone.max' => 'El teléfono movil ingresado no es válido.',
            'phone.min' => 'El teléfono movil ingresado no es válido.',
            'phone.unique' => 'El número de teléfono ingresado ya está en uso.',
            'name.min' => 'El nombre deben tener mas de 2 caracteres',
            'lastname.min' => 'El nombre deben tener mas de 2 caracteres',
            
        ];

    }

    function makeMessages(){

        $messages = [
            'email.required' => 'Debe ingresar su correo electrónico para iniciar sesión.',
            'password.required' => 'Debe ingresar su contraseña para iniciar sesión.',
            'email.email' => 'El campo correo debe ser un correo válido.',
            'password.min' => 'El campo contraseña debe tener al menos 6 caracteres.',
            'password.max' => 'El campo contraseña debe tener menos de 255 caracteres.',
    
        ];
    
        return $messages;
    }
    
    public function register(Request $request)
    {

        $messages = $this->makeMessagesRegister();

        // Validar la solicitud
        $request->validate([
            'rut' => [
                'required',
                'string',
                'max:10',
                'regex:/^\d{7,8}[0-9K]$/', // Valida el formato 11111111-1 o 1111111-K
            ],
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|regex:/^\+56\d{9,12}$/',
        ], $messages);

        $rut = str_replace('-', '', $request->input('rut'));

        // Crear el usuario
        $user = new User();
        $user->rut = $request->input('rut');
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = bcrypt($rut);
        $user->phone = $request->input('phone');
        $user->role = 'user'; // Ajusta según tu lógica
        $user->register_date = now();
        $user->save();

        // Redirigir a la página de inicio de sesión o cualquier otra página
        return redirect()->route('loginForm')->with('success', 'Registro exitoso. Puedes iniciar sesión.');
    }

    public function login(Request $request)
    {

        $messages = $this->makeMessages();
        // Validar la solicitud
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], $messages);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->regenerateToken(); // Regenerar el token CSRF
            return redirect()->route('index'); 
        }
    
        return back()->withErrors([
            'email' => 'Correo o contraseña incorrecta',
        ])->onlyInput('email');


        // Redirigir a la página de inicio de sesión con un mensaje de error
        // return redirect()->route('loginForm')->with('error', 'Credenciales incorrectas.');
    }

    



}