<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificaTipo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   
public function handle($request, Closure $next, $tipo)

{
    if (auth()->check() && auth()->user()->tipo === $tipo) {
        return $next($request);
    }

    abort(403, 'Acesso não autorizado.');
}

}