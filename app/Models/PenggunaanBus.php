<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaanBus extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemesanbus_id',
        'driver1',
        'driver2',
        'co_driver',
        'no_polisi',
    ];

    public function pemesanBus()
    {
        return $this->belongsTo(PemesanBus::class, 'pemesanbus_id', 'id');
    }

    public function suratPerintahJalan()
    {
        return $this->hasOne(SuratPerintahJalan::class);
    }
}
