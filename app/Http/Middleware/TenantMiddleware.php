<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TenantMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Verificamos si hay un usuario autenticado
        if (Auth::check()) {
            $user = Auth::user();

            // 2. Si el usuario no tiene empresa (y no es un super-admin), podríamos dar un error
            if (!$user->company_id) {
                return response()->json(['error' => 'Usuario sin empresa asignada.'], 403);
            }

            // 3. Compartimos el ID de la empresa en el contenedor de Laravel 
            // Esto es como crear una "variable global" segura para esta petición
            app()->instance('current_company_id', $user->company_id);
        }

        return $next($request);
    }
}