<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPerintahJalan extends Model
{
    use HasFactory;

    protected $table = 'surat_perintah_jalan';
    protected $guarded = ['id'];

    public function penggunaanBus()
    {
        return $this->belongsTo(PenggunaanBus::class, 'penggunaan_bus_id','id');
    }

    public function kasPerjalanan()
    {
        return $this->hasOne(KasPerjalanan::class, );
    }
}
