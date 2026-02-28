<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Validator;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        $users = User::all();
        return view('register', compact('users'));
    }

    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'dui' => 'required|unique:users',
            'nit' => 'required|unique:users',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'tipo_contribuyente' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'dui' => $request->dui,
            'nit' => $request->nit,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'tipo_contribuyente' => $request->tipo_contribuyente,
            'password' => Hash::make($request->password),
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->route('register')->with('success', 'Usuario registrado exitosamente');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->route('register')->with('success', 'Usuario eliminado exitosamente');
    }
}
