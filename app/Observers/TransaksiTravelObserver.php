<?php

namespace App\Observers;

use App\Models\TransaksiTravel;
use App\Services\Transaksi\TransaksiService;

class TransaksiTravelObserver
{
    protected $transaksiService;

    public function __construct( TransaksiService $transaksiService ) {
        $this->transaksiService = $transaksiService;
    }


    /**
     * Handle the TransaksiTravel "created" event.
     */
    public function created(TransaksiTravel $transaksiTravel): void
    {
        $dataTransaksi = [
            'tanggal_transaksi' => $transaksiTravel['tanggal_transaksi'],
            'jenis_transaksi_id' => $transaksiTravel['jenis_transaksi_id'],
            'transaksi_travel_id' => $transaksiTravel->id,
            'deskripsi_transaksi' => $transaksiTravel['deskripsi_transaksi'],
            'jumlah' => $transaksiTravel['jumlah'],
        ];

        $this->transaksiService->create($dataTransaksi);
    }

    /**
     * Handle the TransaksiTravel "updated" event.
     */
    public function updated(TransaksiTravel $transaksiTravel): void
    {
        //
    }

    /**
     * Handle the TransaksiTravel "deleted" event.
     */
    public function deleted(TransaksiTravel $transaksiTravel): void
    {
        //
    }

    /**
     * Handle the TransaksiTravel "restored" event.
     */
    public function restored(TransaksiTravel $transaksiTravel): void
    {
        //
    }

    /**
     * Handle the TransaksiTravel "force deleted" event.
     */
    public function forceDeleted(TransaksiTravel $transaksiTravel): void
    {
        //
    }
}
