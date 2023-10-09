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
            $table->foreignId('surat_perintah_jalan_id')->constrained()->onDelete('cascade');
            $table->decimal('driver1_kas', 15, 2)->default(0);
            $table->decimal('driver2_kas', 15, 2)->default(0);
            $table->decimal('co_driver_kas', 15, 2)->default(0);
            $table->decimal('solar', 15, 2)->default(0);
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas_perjalanans');
    }
};
