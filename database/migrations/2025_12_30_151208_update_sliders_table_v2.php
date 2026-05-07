<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
    Schema::table('sliders', function (Blueprint $table) {
        // إذا لم تكن موجودة سابقاً
        if (!Schema::hasColumn('sliders', 'k1_img')) {
            $table->string('k1_img')->nullable();
            $table->string('k2_img')->nullable();
            $table->string('k3_img')->nullable();
            $table->string('f1_img')->nullable();
            $table->string('f2_img')->nullable();
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
