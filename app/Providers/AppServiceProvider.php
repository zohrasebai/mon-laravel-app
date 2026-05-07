<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use App\Models\NavLink;
use App\Models\Achievement;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL; 

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot()
    {
        // --- FIX POUR CODESPACE : FORCER HTTPS ET L'URL RACINE ---
        URL::forceScheme('https');
        
        // Remplace par TON adresse Codespace exactement (celle dans ta barre d'adresse)
        URL::forceRootUrl('https://symmetrical-journey-6965p665jpvjfrxg6-8000.app.github.dev');

        // --- PARTAGE DES VARIABLES GLOBALES ---
        try {
            // Protection pour les liens de navigation
            if (Schema::hasTable('nav_links')) {
                $navLinks = \App\Models\NavLink::orderBy('position', 'asc')->get();
                view()->share('global_nav_links', $navLinks);
            }

            // Protection pour les paramètres (Settings)
            if (Schema::hasTable('settings')) {
                view()->share('global_settings', \App\Models\Setting::pluck('value', 'key')->toArray());
            }

            // Protection pour les réalisations (Achievements)
            if (Schema::hasTable('achievements')) {
                view()->share('global_achievements', \App\Models\Achievement::orderBy('order')->get());
            }
        } catch (\Exception $e) {
            // Ignore les erreurs si les tables n'existent pas encore
        }
    }
}