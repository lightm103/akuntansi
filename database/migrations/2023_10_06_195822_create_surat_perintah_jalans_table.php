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
        Schema::create('surat_perintah_jalan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penggunaan_bus_id')->constrained()->onDelete('cascade');
            $table->string('nomor_spj');
            $table->string('alamat_jemput');
            $table->time('stand_by');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_perintah_jalans');
    }
};
