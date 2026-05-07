<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\{NavLink, Slider, AboutSetting, VideoSection, Service, CoreValue, CoreValueItem, Testimonial};

class MasterWebsiteSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        // 1. روابط القائمة العلوي
        NavLink::truncate();
        NavLink::insert([
            ['title' => 'Accueil', 'url' => '#home', 'position' => 1],
            ['title' => 'Qui sommes-nous', 'url' => '#about', 'position' => 2],
            ['title' => 'Services', 'url' => '#services', 'position' => 3],
            ['title' => 'Contact', 'url' => '#contact', 'position' => 4],
        ]);

        // 2. السلايدر (Sliders)
        Slider::truncate();
        Slider::create([
            'image' => 'assets/images/slider/slide1.jpg',
            'title_fr' => "Accompagner les entreprises\nvers la certification",
            'description_fr' => "Expertise rigoureuse en qualité, sécurité et environnement.",
            'k1_img' => 'assets/images/slider/k1.png',
            'order' => 1
        ]);

        // 3. من نحن (About Settings)
        AboutSetting::truncate();
        AboutSetting::create([
            'image' => 'assets/images/about/consulting.jpg',
            'title_fr' => 'Votre partenaire pour l’excellence.',
            'text_1_fr' => 'Nous sommes un cabinet spécialisé dans l’accompagnement ISO.',
            'text_2_fr' => 'Notre mission : Optimiser vos processus.',
        ]);

        // 4. الخدمات (Services) - الـ 6 خدمات التي في الصورة
        Service::truncate();
        $services = [
            ['title_fr' => 'Conseil & Stratégie', 'desc_fr' => 'Accompagnement sur mesure pour l’obtention de certifications (ISO, HACCP, BRC).'],
            ['title_fr' => 'Audit & Diagnostic', 'desc_fr' => 'Réalisation d’audits internes, audits fournisseurs et audits à blanc.'],
            ['title_fr' => 'Formation Pro', 'desc_fr' => 'Développement des compétences de vos équipes (ISO, AMDEC, KPI).'],
            ['title_fr' => 'Sécurité Alimentaire', 'desc_fr' => 'Expertise dédiée aux normes agroalimentaires (ISO 22000, FSSC, HACCP).'],
            ['title_fr' => 'Qualité & HSE', 'desc_fr' => 'Optimisation de la qualité (ISO 9001), de l’environnement (ISO 14001).'],
            ['title_fr' => 'Performance Durable', 'desc_fr' => 'Mise en place d’أutils d’amélioration continue.'],
        ];
        foreach ($services as $index => $s) {
            Service::create(array_merge($s, ['order' => $index + 1]));
        }

        // 5. قسم الفيديو (Video Section)
        VideoSection::truncate();
        VideoSection::create([
            'video_url' => 'https://www.youtube.com/watch?v=example',
            'video_bg' => 'assets/images/backgrounds/video-bg.jpg',
            'title_fr' => 'Notre Expertise en Vidéo'
        ]);

        // 6. القيم والشهادات (Core Values & Testimonials)
        CoreValue::truncate();
        CoreValue::create(['title_fr' => 'Nos Valeurs', 'desc_fr' => 'Excellence et Intégrité.']);
        
        Testimonial::truncate();
        Testimonial::create(['title_fr' => 'Témoignages', 'desc_fr' => 'Ce que disent nos clients.']);

        // داخل دالة run في MasterWebsiteSeeder
            \App\Models\SectionSetting::truncate();
            \App\Models\SectionSetting::create([
                'section_name' => 'causes_section', // تأكد أن الاسم يطابق ما يبحث عنه الكود في الخطأ
                'subtitle_fr'  => 'Expertise en Certification',
                'title_fr'     => 'Nos Domaines d’Action',
                'desc_fr'      => 'Nous accompagnons les entreprises vers l’excellence via le conseil, la formation et l’audit.'
            ]);
        Schema::enableForeignKeyConstraints();
    }
}