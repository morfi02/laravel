<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Acceso denegado.');
        }

        return $next($request);
    }
}
// Registrar el middleware en app/Http/Kernel.php:
protected $routeMiddleware = [
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
];