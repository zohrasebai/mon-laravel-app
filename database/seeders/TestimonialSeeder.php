<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;
use App\Models\TestimonialItem;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        // 1. إدخال الإعدادات العامة للقسم
        Testimonial::create([
            'subtitle_fr' => 'Témoignages',
            'title_fr'    => 'La Confiance de nos Partenaires',
            'desc_fr'     => 'La satisfaction de nos clients est au cœur de notre action. Découvrez comment nous accompagnons les entreprises vers l’excellence et la certification durable.'
        ]);

        // 2. إدخال آراء العملاء الأربعة
        $testimonials = [
            [
                'name'    => 'Directeur Qualité',
                'text_fr' => 'Un accompagnement exceptionnel pour notre certification ISO 22000. L’expertise technique et la rigueur de QualiPro Plus ont été déterminantes pour optimiser nos processus.',
                'img'     => 'assets/images/testimonial/1.jpg'
            ],
            [
                'name'    => 'Responsable HSE',
                'text_fr' => 'Grâce aux audits à blanc et aux formations sur mesure, nous avons abordé notre audit de certification avec sérénité et professionnalisme.',
                'img'     => 'assets/images/testimonial/2.jpg'
            ],
            [
                'name'    => 'Gérant Industrie Agro',
                'text_fr' => 'Une équipe intègre et engagée. Leur maîtrise des normes HACCP et FSSC nous a permis de renforcer la sécurité alimentaire de nos produits durablement.',
                'img'     => 'assets/images/testimonial/3.jpg'
            ],
            [
                'name'    => 'Chef de Projet',
                'text_fr' => 'Plus qu’un simple consultant, un véritable partenaire stratégique. Leur approche basée sur la valeur ajoutée a transformé notre culture d’organisation.',
                'img'     => 'assets/images/testimonial/4.jpg'
            ],
        ];

        foreach ($testimonials as $item) {
            TestimonialItem::create($item);
        }
    }
}