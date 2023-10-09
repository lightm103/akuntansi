<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPerintahJalan extends Model
{
    use HasFactory;

    public function penggunaanBus()
    {
        return $this->belongsTo(PenggunaanBus::class);
    }

    public function kasPerjalanan()
    {
        return $this->hasOne(KasPerjalanan::class);
    }
}
