<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class initialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // روابط القائمة
    \App\Models\NavLink::updateOrCreate(['title' => 'Accueil'], ['url' => '/', 'position' => 1]);
    \App\Models\NavLink::updateOrCreate(['title' => 'Service'], ['url' => '#service', 'position' => 2]);

    // الإحصائيات
    \App\Models\Achievement::updateOrCreate(['title' => 'Satisfaction Client'], ['count' => '100%', 'order' => 1]);
    \App\Models\Achievement::updateOrCreate(['title' => 'Normes Maîtrisées'], ['count' => '10', 'order' => 2]);
}
}
