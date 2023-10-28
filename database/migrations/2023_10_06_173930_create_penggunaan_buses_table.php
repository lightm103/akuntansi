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
            $table->foreignId('pemesanbus_id')->constrained('pemesan_buses', 'id');
            $table->integer('uang_masuk');
            $table->string('driver1');
            $table->string('driver2');
            $table->string('co_driver');
            $table->string('no_polisi');
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
