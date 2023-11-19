<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesanBus extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function totalUangMasuk()
    {
        $uangMasuk = [];
        $transaksiTravels = $this->transaksiTravel;
        if (count($transaksiTravels) >= 1)
        {
            foreach ($transaksiTravels as $transaksiTravel)
            {
                $uangMasuk = $transaksiTravel->where('pemesan_bus_id', $transaksiTravel->pemesanBus->id)->whereHas('jenisTransaksi', function ($query) {
                    $query->where('kode_jenis_transaksi', 'debit');
                })->get();
            }
            return $uangMasuk->sum('jumlah');
        }
        return null;
    }

    public function penggunaanBus()
    {
        return $this->hasOne(PenggunaanBus::class, 'pemesan_id', 'id');
    }

    public function transaksiTravel()
    {
        return $this->hasMany(TransaksiTravel::class);
    }
}
