<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Setting;
use App\Models\Achievement; // Importation du modèle
use App\Models\VideoSection; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Créer l'administrateur par défaut
        User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Administrateur',
                'password' => bcrypt('password'), // Mot de passe : password
            ]
        );

        // 2. Créer les Paramètres Globaux
        $defaults = [
            ['key' => 'phone', 'value' => '0699 75 80 30 / 0776 70 75 80'],
            ['key' => 'email', 'value' => 'qualiproplus16@gmail.com'],
            ['key' => 'address', 'value' => 'Alger, Algérie'],
            ['key' => 'footer_text', 'value' => 'Plus qu’un cabinet, nous sommes votre partenaire pour l’excellence...'],
            ['key' => 'logo', 'value' => 'assets/images/logo/Image1.png'],
            ['key' => 'facebook_url', 'value' => 'https://www.facebook.com/share/17Sx6r89As/'],
            ['key' => 'linkedin_url', 'value' => 'https://www.linkedin.com/company/qualipro-plus/'],
            ['key' => 'instagram_url', 'value' => 'https://www.instagram.com/quali_proplus'],
        ];

        foreach ($defaults as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // 3. Créer les Réalisations (IMPORTANT : Utiliser 'description')
        $achievements = [
            [
                'title' => 'Satisfaction client',
                'description' => 'Nous plaçons la satisfaction de nos clients au cœur de notre action, en construisant des relations durables basées sur la confiance, la qualité de service et l’écoute attentive.', // CHANGE ICI
                'icon' => 'fa-smile-o',
                'order' => 1,
            ],
            [
                'title' => 'Éthique et déontologie',
                'description' => 'Nous agissons avec intégrité, courtoisie et équité envers nos clients, nos collaborateurs et notre environnement, en respectant les principes fondamentaux du conseil.', // CHANGE ICI
                'icon' => 'fa-gavel',
                'order' => 2,
            ],
            [
                'title' => 'Esprit d\'équipe et partage',
                'description' => 'Nous valorisons le travail collaboratif et le partage des connaissances, favorisant un environnement propice au développement de chacun.', // CHANGE ICI
                'icon' => 'fa-users',
                'order' => 3,
            ],
            [
                'title' => 'Engagement et valeur ajoutée',
                'description' => 'Nous nous impliquons avec passion dans chaque projet, visant à générer une réelle valeur ajoutée pour votre entreprise. Nous capitalisons sur nos expériences pour améliorer constamment nos pratiques, outils et solutions.', // CHANGE ICI
                'icon' => 'fa-star',
                'order' => 4,
            ],
        ];

        foreach ($achievements as $ach) {
            Achievement::updateOrCreate(['title' => $ach['title']], [
                'description' => $ach['description'], // <--- CHANGE ICI : Utilise 'description'
                'icon' => $ach['icon'],
                'order' => $ach['order'],
            ]);
        }

        // 4. Création de la Vidéo
        $video = \App\Models\VideoSection::firstOrCreate([]);
        $video->video_file = 'assets/video/Presentation_QualiProPlus.mp4';
        $video->title_fr = "QualiPro Plus : Votre Expertise en Vidéo";
        $video->text_fr = "Accompagner les entreprises vers la certification est notre mission...";
        $video->save();

        echo "Database seeded avec succès (Admin, Réglages, Réalisations, Vidéo).";
    }
}