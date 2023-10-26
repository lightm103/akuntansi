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
        Schema::create('hutang_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('total_uang');
            $table->string('nama_toko');
            $table->enum('status', ['lunas', 'belum_lunas'])->default('belum_lunas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hutang_barangs');
    }
};
