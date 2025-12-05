<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // L'utilisateur n'est pas connecté
        if (! $request->user()) {
            return redirect()->route('auth.login');
        }

        // Vérifie si le rôle de l'utilisateur correspond à au moins un rôle autorisé
        if (! in_array($request->user()->role, $roles)) {
            abort(403, 'Accès interdit');
        }

        return $next($request);
    }
}
