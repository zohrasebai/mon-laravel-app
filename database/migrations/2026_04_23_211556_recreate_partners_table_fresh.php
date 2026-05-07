<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. On détruit l'ancienne table (même si elle est cassée)
        Schema::dropIfExists('partners');

        // 2. On la recrée PROPREMENT
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Pour le nom
            $table->string('image')->nullable(); // Pour l'image (image, PAS logo)
            $table->integer('order')->default(0); // Pour l'ordre
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};