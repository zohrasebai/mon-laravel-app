<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Afficher le formulaire d'inscription
     * Ajoute cette méthode pour gérer l'affichage proprement
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Créer un nouvel utilisateur
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // 'confirmed' vérifie que le champ password_confirmation correspond
        ], [
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        // Création de l'utilisateur
        // Note : J'ai simplifié l'appel à Hash car il est importé en haut
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirection vers la page de connexion avec un message de succès
        return redirect()->route('login')
                         ->with('success', 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.');
    }
}