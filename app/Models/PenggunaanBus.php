<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaanBus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'tanggal_berangkat',
        'tanggal_pulang',
        'biaya_sewa',
        'uang_masuk',
        'driver1',
        'driver2',
        'co_driver',
        'no_polisi',
        'tujuan',
        'no_telp'
    ];

    public function suratPerintahJalan()
    {
        return $this->hasOne(SuratPerintahJalan::class);
    }
}