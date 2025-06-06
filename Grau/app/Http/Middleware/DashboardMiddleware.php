<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DashboardMiddleware
{
    public function handle($request, Closure $next)
    {
    if (!app(\App\Models\User::class)->hasPermissionTo('dashboard')) {
        return redirect()->route('home');
    }
        return $next($request);
    }
}