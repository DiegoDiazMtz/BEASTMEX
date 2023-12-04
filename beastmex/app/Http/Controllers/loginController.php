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

        $usuario = DB::table('usuarios')
            ->where('correo', $request->input('correo'))
            ->where('contrasena', $request->input('contrasena'))
            ->first();

        if ($usuario) {
            $this->storeUserSession($request, $usuario);

            switch ($usuario->rol) {
                case 'Gerente':
                    return redirect()->route('administrador.index');
                case 'Auxiliar':
                    return redirect()->route('almacen.index');
                case 'Coordinador Ventas':
                    return redirect()->route('ventas.index');
                case 'Coordinador Compras':
                    return redirect()->route('compras.index');
                case 'Usuario':
                    return redirect()->route('usuarios.index');
                default:
                    return back()->with('fail', 'El usuario no tiene rol asignado.');
            }
            
        }

        return back()->with('fail', 'Correo o contraseña incorrectos');
    }

    private function storeUserSession(Request $request, $usuario)
    {
        $request->session()->put([
            'rol' => $usuario->rol,
            'correo' => $usuario->correo,
            'nombre' => $usuario->nombre_completo,
        ]);
    }


    public function edit()
    {
        return view('cambiarContraseña');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('rol');
        $request->session()->forget('correo');
        
        return redirect()->route('login.index');
    }

}
