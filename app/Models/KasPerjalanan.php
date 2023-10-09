<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasPerjalanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'surat_perintah_jalan_id',
        'driver1_kas',
        'driver2_kas',
        'co_driver_kas',
        'solar'
    ];

    public function suratPerintahJalan()
    {
        return $this->belongsTo(SuratPerintahJalan::class);
    }
}
