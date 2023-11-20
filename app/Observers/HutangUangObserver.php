<?php

namespace App\Observers;

use App\Models\HutangUang;
use App\Services\Transaksi\TransaksiService;

class HutangUangObserver
{
    protected $transaksiService;
    public function __construct(TransaksiService $transaksiService)
    {
        $this->transaksiService = $transaksiService;
    }
    /**
     * Handle the HutangUang "created" event.
     */
    public function created(HutangUang $hutangUang): void
    {
        //
    }

    /**
     * Handle the HutangUang "updated" event.
     */
    public function updated(HutangUang $hutangUang): void
    {
        if($hutangUang->status == 'lunas')
        {
            $dataTransaksi = [
                'tanggal_transaksi' => $hutangUang->created_at,
                'jenis_transaksi_id' => 9,
                'deskripsi_transaksi' => 'Bayar '.$hutangUang->keterangan,
                'jumlah' => $hutangUang->jumlah_uang,
            ];

            $this->transaksiService->create($dataTransaksi);
        }
    }

    /**
     * Handle the HutangUang "deleted" event.
     */
    public function deleted(HutangUang $hutangUang): void
    {
        //
    }

    /**
     * Handle the HutangUang "restored" event.
     */
    public function restored(HutangUang $hutangUang): void
    {
        //
    }

    /**
     * Handle the HutangUang "force deleted" event.
     */
    public function forceDeleted(HutangUang $hutangUang): void
    {
        //
    }
}
