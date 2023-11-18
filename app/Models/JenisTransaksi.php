<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class JenisTransaksi extends Model
{
    use HasFactory;

    protected $table = 'jenis_transaksis';
    protected $guarded = ['id'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function transaksiTravel()
    {
        return $this->hasMany(TransaksiTravel::class);
    }

    public function transaksiProject()
    {
        return $this->hasMany(TransaksiProject::class);
    }
}
