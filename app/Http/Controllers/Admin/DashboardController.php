<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\NavLink;
use App\Models\Achievement;

class DashboardController extends Controller
{
    // Page d'accueil du Dashboard
    public function index() {
        return view('admin.dashboard');
    }

    // =========================================
    // --- GESTION DES PARAMÈTRES (Settings) ---
    // =========================================
    public function settings()
    {
        // On récupère tous les réglages sous forme de tableau clé => valeur
        $settings = Setting::pluck('value', 'key');
        
        // On passe aussi les stats pour le haut de page (optionnel)
        $global_achievements = Achievement::all();
        
        // Note: La vue doit être dans admin/settings/index.blade.php
        return view('admin.settings.index', compact('settings', 'global_achievements'));
    }

    public function updateSettings(Request $request)
    {
        // 1. Mise à jour des textes simples (Tél, Email, Réseaux...)
        $inputs = $request->only(['phone', 'email', 'address', 'footer_text', 'facebook_url', 'linkedin_url', 'instagram_url']);
        
        foreach ($inputs as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 2. Gestion du Logo (Upload d'image)
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_logo.' . $file->getClientOriginalExtension();
            
            // On déplace le fichier dans public/logos
            // Assure-toi que le dossier public/logos existe ou est accessible en écriture
            $file->move(public_path('logos'), $filename);
            
            $path = 'logos/' . $filename;
            
            // On sauvegarde le chemin dans la BDD
            Setting::updateOrCreate(['key' => 'logo'], ['value' => $path]);
        }

        return redirect()->back()->with('success', 'Paramètres mis à jour avec succès.');
    }

    // =========================================
    // --- GESTION DES LIENS DE NAVIGATION ---
    // =========================================
    public function navLinks() {
        $navLinks = NavLink::orderBy('position')->get();
        return view('admin.nav_links', compact('navLinks'));
    }

    public function updateNavLinks(Request $request) {
        if ($request->has('nav_links')) {
            foreach ($request->nav_links as $id => $data) {
                NavLink::where('id', $id)->update([
                    'title'     => $data['title'],
                    'url'       => $data['url'],
                    'position'  => $data['position'],
                    'is_active' => isset($data['is_active']) ? true : false,
                ]);
            }
        }
        return back()->with('success', 'Les liens du menu ont été mis à jour !');
    }

    // =========================================
    // --- GESTION DES RÉALISATIONS (Achievements) ---
    // =========================================
    public function achievements()
    {
        $global_achievements = Achievement::orderBy('order')->get();
        // La vue doit être admin/achievements/index.blade.php
        return view('admin.achievements.index', compact('global_achievements'));
    }

    // Suppression de la fonction 'updateAchievements' (ancienne version bulk edit)
    // Car on utilise maintenant 'store' (ajout unique) et 'destroy' (suppression)

    public function storeAchievement(Request $request)
    {
        Achievement::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'icon' => $request->icon,
            'order' => $request->order ?? 0
        ]);

        return redirect()->back()->with('success', 'Réalisation ajoutée avec succès.');
    }

    public function destroyAchievement($id)
    {
        Achievement::destroy($id);
        return redirect()->back()->with('success', 'Réalisation supprimée.');
    }
}