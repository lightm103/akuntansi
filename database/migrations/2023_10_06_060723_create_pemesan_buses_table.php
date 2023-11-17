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
        Schema::create('pemesan_buses', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_pulang')->nullable();
            $table->integer('biaya_sewa');
            $table->integer('biaya_dp')->nullable();
            $table->string('tujuan');
            $table->string('no_telp');
            $table->string('alamat_jemput')->nullable();
            $table->string('standby')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesan_buses');
    }
};
