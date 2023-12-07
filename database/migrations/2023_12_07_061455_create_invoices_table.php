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
    Schema::create('invoices', function (Blueprint $table) {
        $table->id();
        $table->string('no_booking');
        $table->date('tgl_pesan');
        $table->date('tgl_pemakaian');
        $table->string('nama_penyewa');
        $table->string('tujuan_wisata');
        $table->integer('jumlah_unit');
        $table->string('rute');
        $table->string('alamat_jemput');
        $table->string('contact_person');
        $table->decimal('harga', 10, 2);
        $table->decimal('pembayaran', 10, 2);
        $table->decimal('sisa', 10, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
