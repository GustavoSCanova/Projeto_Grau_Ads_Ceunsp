<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

         $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
        'tipo' => ['required', 'in:aluno,professor'], // Validação do tipo
    ]);

    if (Auth::attempt([
        'email' => $credentials['email'],
        'password' => $credentials['password'],
        'tipo' => $credentials['tipo'], // Confere se o tipo corresponde
    ])) {
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    return back()->withErrors([
        'email' => 'As credenciais fornecidas estão incorretas.',
    ]);
}
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
