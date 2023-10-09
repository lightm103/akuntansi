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
        Schema::create('penggunaan_buses', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_pulang')->nullable();
            $table->decimal('biaya_sewa', 15, 2);
            $table->decimal('uang_masuk', 15, 2)->default(0);
            $table->string('driver1');
            $table->string('driver2');
            $table->string('co_driver');
            $table->string('no_polisi');
            $table->string('tujuan');
            $table->string('no_telp');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunaan_buses');
    }
};
