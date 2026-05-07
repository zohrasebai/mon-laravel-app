<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Afficher la page de connexion
    public function showLogin()
    {
        return view('auth.login');
    }

    // Traitement de la connexion
    public function login(Request $request)
    {
        // Validation avec messages en français
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'password.required' => 'Le mot de passe est obligatoire.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirection vers le tableau de bord (URL française)
            return redirect()->intended('https://symmetrical-journey-6965p665jpvjfrxg6-8000.app.github.dev/admin/tableau-de-bord')
                 ->with('success', 'Bienvenue sur votre tableau de bord.');
        }

        // Erreur d'authentification en français
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Vous avez été déconnecté avec succès.');
    }
}