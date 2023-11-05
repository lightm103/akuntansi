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
        Schema::disableForeignKeyConstraints();
        Schema::create('surat_perintah_jalan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penggunaan_bus_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nomor_spj');
            $table->integer('biaya_driver1');
            $table->integer('biaya_driver2')->nullable()->default(0);
            $table->integer('biaya_codriver')->nullable()->default(0);
            $table->integer('biaya_solar')->nullable()->default(0);
            $table->integer('biaya_lainnya')->nullable()->default(0);
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('surat_perintah_jalans');
        Schema::enableForeignKeyConstraints();
    }
};
