<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_project', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projects_id')->constrained('projects', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal_transaksi');
            $table->string('deskripsi_transaksi');
            $table->foreignId('jenis_transaksi_id')->constrained('jenis_transaksis', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_project');
    }
};
