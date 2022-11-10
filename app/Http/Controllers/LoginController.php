<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credencials = $request->only('username', 'password');

        if (Auth::attempt($credencials)) {
            //return "Login";
            $request->session()->regenerate();
            return redirect()->route('home');
        }else{
            //return "No Login";
            return redirect()->back()->with('danger','¡Usuario y/o contraseña incorrecta!');
        }
    }

    public function logout(Request $request){ 
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
