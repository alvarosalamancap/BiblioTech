<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasswordChangeController extends Controller
{
    /**
     * Muestra la vista para cambiar la contraseña.
     */
    public function showChangePasswordForm()
    {
        return view('change-password');
    }

    /**
     * Procesa la solicitud de cambio de contraseña.
     */
    public function changePassword(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'current_password' => 'required',
            'new_password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',      // Al menos una letra mayúscula
                'regex:/[0-9]/',      // Al menos un número
                'confirmed'           // Debe coincidir con 'new_password_confirmation'
            ],
        ], [
            'new_password.regex' => 'La nueva contraseña debe tener al menos una letra mayúscula y un número.',
            'new_password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $user = Auth::user();

        // Verificación de la contraseña actual
        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'La contraseña actual no es correcta.',
            ]);
        }

        // Actualización de la nueva contraseña
        $user->password = Hash::make($request->new_password);
        $user->save();
 
        return redirect()->route('password.change')->with('success', '¡Contraseña actualizada con éxito!');
    }
    
}