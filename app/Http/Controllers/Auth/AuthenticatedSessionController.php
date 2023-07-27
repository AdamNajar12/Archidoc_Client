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
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // Vérifiez le rôle de l'utilisateur et redirigez-le en conséquence
        if ($user->role === 'intervenant') {
            return redirect('/tickets/AddFront');
        } elseif ($user->role === 'admin') {
            return redirect('/clients');
        } elseif ($user->role === 'super_admin') {
            // Vous pouvez personnaliser la redirection pour les super administrateurs
            return redirect('/front-page');
        }
    
        // Redirection par défaut si le rôle n'est pas reconnu
        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
