<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Verificar si el usuario tiene al menos uno de los roles necesarios
        if ($request->session()->has('rol') && count(array_intersect($roles, [$request->session()->get('rol')])) > 0) {
            return $next($request);
        }

        // Redireccionar a una ruta de acceso no autorizado o a donde desees
        return redirect()->route('login.index')->with('fail', 'Acceso no autorizado.');
    }
}
