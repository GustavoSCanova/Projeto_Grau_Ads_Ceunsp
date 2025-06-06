<?php

// File: app/Http/Middleware/IsAluno.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAluno
{
    public function handle(Request $request, Closure $next)
    {
        // Logic to check if the user is an aluno
        if (auth()->check() && auth()->user()->tipo === 'aluno') {
            return $next($request);
        }

        abort(403, 'Acesso negado');
    }
}