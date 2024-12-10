<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Verifica se há uma sessão ativa
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Access denied. Please login.');
        }

        // Verifica se o usuário é admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Access denied.');
        }

        return $next($request); // Permite acesso
    }
}