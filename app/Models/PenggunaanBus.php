<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaanBus extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemesan_id',
        'armada_id',
        'driver1',
        'driver2',
        'co_driver',
    ];

    public function pemesanBus()
    {
        return $this->belongsTo(PemesanBus::class, 'pemesan_id', 'id');
    }

    public function suratPerintahJalan()
    {
        return $this->hasOne(SuratPerintahJalan::class);
    }

    public function armadaBus()
    {
        return $this->belongsTo(ArmadaBus::class, 'armada_id', 'id');
    }
}
