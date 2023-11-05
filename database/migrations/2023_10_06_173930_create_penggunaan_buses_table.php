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
            $table->foreignId('pemesan_id')->constrained('pemesan_buses', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('armada_id')->constrained('armada_buses', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('driver1');
            $table->string('driver2')->nullable();
            $table->string('co_driver')->nullable();
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
