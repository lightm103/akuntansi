<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kas_perjalanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_perintah_jalan_id')->constrained('surat_perintah_jalan', 'id');
            $table->integer('driver1_kas');
            $table->integer('driver2_kas');
            $table->integer('co_driver_kas');
            $table->integer('solar_kas');
            $table->integer('lain_lain_kas');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas_perjalanan');
    }
};
