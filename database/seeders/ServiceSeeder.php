<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service; // استدعاء الموديل

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'title_fr' => 'Conseil & Stratégie',
                'desc_fr'  => 'Accompagnement sur mesure pour l’obtention de certifications (ISO, HACCP, BRC) et la mise en place de systèmes de management performants.',
                'order'    => 1
            ],
            [
                'title_fr' => 'Audit & Diagnostic',
                'desc_fr'  => 'Réalisation d’audits internes, audits fournisseurs et audits à blanc pour évaluer la conformité et identifier les axes d’amélioration.',
                'order'    => 2
            ],
            [
                'title_fr' => 'Formation Pro',
                'desc_fr'  => 'Développement des compétences de vos équipes (ISO, AMDEC, KPI) pour renforcer l’efficacité opérationnelle et managériale.',
                'order'    => 3
            ],
            [
                'title_fr' => 'Sécurité Alimentaire',
                'desc_fr'  => 'Expertise dédiée aux normes agroalimentaires (ISO 22000, FSSC, HACCP) pour garantir hygiène et sécurité de vos produits.',
                'order'    => 4
            ],
            [
                'title_fr' => 'Qualité & HSE',
                'desc_fr'  => 'Optimisation de la qualité (ISO 9001), de l’environnement (ISO 14001) et de la santé au travail (ISO 45001).',
                'order'    => 5
            ],
            [
                'title_fr' => 'Performance Durable',
                'desc_fr'  => 'Mise en place d’outils d’amélioration continue pour transformer vos contraintes réglementaires en leviers de croissance.',
                'order'    => 6
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}