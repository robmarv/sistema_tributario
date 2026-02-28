<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        $users = User::all();
        return view('register', compact('users'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'dui' => 'required|unique:users',
            'nit' => 'required|unique:users',
            'fecha_nacimiento' => 'required|date',
            'municipio' => 'required',
            'distrito' => 'required',
            'perfil' => 'required',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'tipo_contribuyente' => 'required',
            'password' => 'required|min:6',
            'modulos' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'dui' => $request->dui,
            'nit' => $request->nit,
            'municipio' => $request->municipio,
            'distrito' => $request->distrito,
            'perfil' => $request->perfil,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'tipo_contribuyente' => $request->tipo_contribuyente,
            'password' => Hash::make($request->password),
            'modulos' => $request->modulos ? implode(',', $request->modulos) : null,
        ]);

        \App\Models\Bitacora::create([
            'usuario_id' => Auth::check() ? Auth::id() : $user->id,
            'accion' => 'registro',
            'modulo' => 'usuarios',
            'descripcion' => 'Registro de usuario: ' . $user->email,
            'ip' => $request->ip(),
            'fecha' => now(),
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->route('register')->with('success', 'Usuario registrado exitosamente');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        \App\Models\Bitacora::create([
            'usuario_id' => Auth::check() ? Auth::id() : $id,
            'accion' => 'eliminacion',
            'modulo' => 'usuarios',
            'descripcion' => 'Eliminación de usuario: ' . $user->email,
            'ip' => request()->ip(),
            'fecha' => now(),
        ]);
        $user->delete();
        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->route('register')->with('success', 'Usuario eliminado exitosamente');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'dui' => 'required|unique:users,dui,' . $id,
            'nit' => 'required|unique:users,nit,' . $id,
            'fecha_nacimiento' => 'required|date',
            'municipio' => 'required',
            'distrito' => 'required',
            'perfil' => 'required',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'tipo_contribuyente' => 'required',
            'modulos' => 'nullable|array',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'dui' => $request->dui,
            'nit' => $request->nit,
            'municipio' => $request->municipio,
            'distrito' => $request->distrito,
            'perfil' => $request->perfil,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'tipo_contribuyente' => $request->tipo_contribuyente,
            'modulos' => $request->modulos ? implode(',', $request->modulos) : null,
        ]);
        \App\Models\Bitacora::create([
            'usuario_id' => Auth::check() ? Auth::id() : $id,
            'accion' => 'edicion',
            'modulo' => 'usuarios',
            'descripcion' => 'Edición de usuario: ' . $user->email,
            'ip' => $request->ip(),
            'fecha' => now(),
        ]);
        return response()->json(['success' => true]);
    }
}
