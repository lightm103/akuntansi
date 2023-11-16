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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_transaksi');
            $table->string('deskripsi_transaksi');
            $table->integer('jumlah');
            $table->foreignId('jenis_transaksi_id')->constrained('jenis_transaksis', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('transaksi_travel_id')->nullable()->constrained('transaksi_travel', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('transaksi_project_id')->nullable()->constrained('transaksi_project', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
