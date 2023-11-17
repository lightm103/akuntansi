<?php

namespace App\Observers;

use App\Models\TransaksiProject;
use App\Services\Transaksi\TransaksiService;

class TransaksiProjectObserver
{
    protected $transaksiService;

    public function __construct(TransaksiService $transaksiService)
    {
        $this->transaksiService = $transaksiService;
    }

    /**
     * Handle the TransaksiProject "created" event.
     */
    public function created(TransaksiProject $transaksiProject): void
    {
        $dataTransaksi = [
            'tanggal_transaksi' => $transaksiProject['tanggal_transaksi'],
            'jenis_transaksi_id' => $transaksiProject['jenis_transaksi_id'],
            'transaksi_project_id' => $transaksiProject->id,
            'deskripsi_transaksi' => $transaksiProject['deskripsi_transaksi'],
            'jumlah' => $transaksiProject['jumlah'],
        ];

        $this->transaksiService->create($dataTransaksi);
    }

    /**
     * Handle the TransaksiProject "updated" event.
     */
    public function updated(TransaksiProject $transaksiProject): void
    {
        //
    }

    /**
     * Handle the TransaksiProject "deleted" event.
     */
    public function deleted(TransaksiProject $transaksiProject): void
    {
        //
    }

    /**
     * Handle the TransaksiProject "restored" event.
     */
    public function restored(TransaksiProject $transaksiProject): void
    {
        //
    }

    /**
     * Handle the TransaksiProject "force deleted" event.
     */
    public function forceDeleted(TransaksiProject $transaksiProject): void
    {
        //
    }
}
