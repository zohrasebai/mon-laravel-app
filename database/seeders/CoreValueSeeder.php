<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoreValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
    \App\Models\CoreValue::create([
        'subtitle_fr' => 'Nos Valeurs Fondent Notre Succès',
        'title_fr' => 'Valeurs Essentielles',
        'desc_fr' => 'Nous plaçons l’éthique et la satisfaction client au cœur de notre action...',
        'image' => 'https://cdn.bcs-express.ru/article-head/7180.jpg'
    ]);

    $items = [
        ['title_fr' => 'Satisfaction Client', 'desc_fr' => 'Des relations durables basées sur la confiance.'],
        ['title_fr' => 'Éthique & Rigueur', 'desc_fr' => 'Intégrité et équité en respectant les principes.'],
        ['title_fr' => 'Esprit d’Équipe', 'desc_fr' => 'Travail collaboratif et partage.'],
        ['title_fr' => 'Valeur Ajoutée', 'desc_fr' => 'Engagement passionné visant la performance.'],
    ];
    foreach($items as $item) \App\Models\CoreValueItem::create($item);
}
}
