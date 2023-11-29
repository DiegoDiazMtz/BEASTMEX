<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//manejo de base de datos
use Carbon\Carbon;//manejo de horas y fechas

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required',
        ]);
    
        $correo = $request->input('correo');
        $contrasena = $request->input('contrasena');
    
        // Realizar la consulta a la base de datos
        $usuario = DB::table('usuarios')
            ->where('correo', $correo)
            ->first();
    
        // Verificar si el usuario existe y la contraseña es correcta
        if ($usuario->contrasena === $contrasena) {
            // Autenticación exitosa
            // Puedes hacer más acciones aquí si es necesario
            return redirect()->route('administrador.index');
        }
    
        // Autenticación fallida
        return back()->with('fail', 'Correo o contraseña incorrectos.');
    }
}
