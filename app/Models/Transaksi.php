<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $guarded = ['id'];

    public function transaksiTravel()
    {
        return $this->belongsTo(TransaksiTravel::class);
    }

    public function jenisTransaksi()
    {
       return $this->belongsTo(JenisTransaksi::class);
    }
}
