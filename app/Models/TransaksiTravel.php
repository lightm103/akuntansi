<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTravel extends Model
{
    use HasFactory;

    protected $table = 'transaksi_travel';
    protected $guarded = ['id'];

    public function pemesanBus()
    {
        return $this->belongsTo(PemesanBus::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
