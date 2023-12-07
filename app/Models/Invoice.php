<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_booking',
        'tgl_pesan',
        'tgl_pemakaian',
        'nama_penyewa',
        'tujuan_wisata',
        'jumlah_unit',
        'rute',
        'alamat_jemput',
        'contact_person',
        'harga',
        'pembayaran',
        'sisa',
    ];
    
}
