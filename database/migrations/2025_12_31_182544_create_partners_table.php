<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('partners', function (Blueprint $table) {
        $table->id();
        $table->string('name')->nullable(); // تأكد من وجود هذا السطر
        $table->string('logo')->nullable(); // تأكد من وجود هذا السطر
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
