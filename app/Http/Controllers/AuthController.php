<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('loginform');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            \App\Models\Bitacora::create([
                'usuario_id' => Auth::id(),
                'accion' => 'login',
                'modulo' => 'autenticacion',
                'descripcion' => 'Inicio de sesión',
                'ip' => $request->ip(),
                'fecha' => now(),
            ]);
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request)
    {
        $usuario_id = Auth::id();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        \App\Models\Bitacora::create([
            'usuario_id' => $usuario_id,
            'accion' => 'logout',
            'modulo' => 'autenticacion',
            'descripcion' => 'Cierre de sesión',
            'ip' => $request->ip(),
            'fecha' => now(),
        ]);
        return redirect()->route('login');
    }
}