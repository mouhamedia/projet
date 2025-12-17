<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si l'utilisateur est connecté ET qu'il est admin
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        // Sinon, retour à l'accueil avec erreur
        return redirect('/')->with('error', "Vous n'avez pas l'autorisation d'accéder à cette page.");
    }
}