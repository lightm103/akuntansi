<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesanBus extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penggunaanBus()
    {
        return $this->hasOne(PenggunaanBus::class);
    }

    public function transaksiTravel()
    {
        return $this->hasMany(TransaksiTravel::class);
    }
}
