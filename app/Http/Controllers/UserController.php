<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    public function register(Request $request){
        try{
            $validated = $request->validate([
                'name' => ['required'],
                'lastname' => ['required'],
                'email' => ['required','email','unique:users'],	
                'password' => ['required', 'string'],
                'role' => ['required'],
                'rut' => ['required', 'regex:/^\d{7,8}-[0-9Kk]$/','unique:users,rut'],
                'phone' => ['required', 'digits_between:9,12','starts_with:+56'],
            ]);

            $roleValid = Role::where('name', $request->role)->first();


            if(!$roleValid){
                return redirect()->back()->with('error', 'El rol ingresado no es válido');
            }

            if(User::where('email', $request->email)->first()){
                return redirect()->back()->with('error', 'El email ingresado ya está en uso');
            }

                User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'role' => $request->role,
                'rut' => $request->rut,
                'phone' => $request->phone,
                'register_date' => now(),
    
                $password =  str_replace(['.', '-'], '', request('rut')),
                'password' => bcrypt($password),
            ]);


        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }


        
        


            
      
    }
}
