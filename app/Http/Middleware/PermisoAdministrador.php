<?php

namespace App\Http\Middleware;

use Closure;

class PermisoAdministrador
{
    public function handle($request, Closure $next)
    {
        if ($this->permiso())
            return $next($request);
        return redirect('/')->with('mensaje', 'No tiene permiso para entrar aquí');
    }

    private function permiso()
    {
        return session()->get('rol_nombre') == 'administrador';
    }
}
