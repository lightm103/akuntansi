<?php

namespace App\Observers;

use App\Models\HutangBarang;
use App\Services\Transaksi\TransaksiService;

class HutangBarangObserver
{
    protected $transaksiService;
    public function __construct(TransaksiService $transaksiService)
    {
        $this->transaksiService = $transaksiService;
    }

    /**
     * Handle the HutangBarang "created" event.
     */
    public function created(HutangBarang $hutangBarang): void
    {
        //
    }

    /**
     * Handle the HutangBarang "updated" event.
     */
    public function updated(HutangBarang $hutangBarang): void
    {
        if($hutangBarang->status == 'lunas')
        {
            $dataTransaksi = [
                'tanggal_transaksi' => $hutangBarang->created_at,
                'jenis_transaksi_id' => 9,
                'deskripsi_transaksi' => 'Bayar '.$hutangBarang->nama_barang.' dari '.$hutangBarang->nama_toko,
                'jumlah' => $hutangBarang->total_uang,
            ];

            $this->transaksiService->create($dataTransaksi);
        }
    }

    /**
     * Handle the HutangBarang "deleted" event.
     */
    public function deleted(HutangBarang $hutangBarang): void
    {
        //
    }

    /**
     * Handle the HutangBarang "restored" event.
     */
    public function restored(HutangBarang $hutangBarang): void
    {
        //
    }

    /**
     * Handle the HutangBarang "force deleted" event.
     */
    public function forceDeleted(HutangBarang $hutangBarang): void
    {
        //
    }
}
