<?php

namespace App\Observers;

use App\Models\Transaksi;

class TransaksiObserver
{
    /**
     * Handle the Transaksi "created" event.
     */
    public function created(Transaksi $transaksi): void
    {
        //
    }

    /**
     * Handle the Transaksi "updated" event.
     */
    public function updated(Transaksi $transaksi): void
    {
        //
    }

    /**
     * Handle the Transaksi "deleted" event.
     */
    public function deleted(Transaksi $transaksi): void
    {
        switch (true) {
            case!is_null($transaksi->transaksiTravel):
                $transaksi->transaksiTravel()->delete();
                break;
            case!is_null($transaksi->transaksiProject()):
                $transaksi->transaksiProject()->delete();
                break;
            default:
                break;
        }
    }

    /**
     * Handle the Transaksi "restored" event.
     */
    public function restored(Transaksi $transaksi): void
    {
        //
    }

    /**
     * Handle the Transaksi "force deleted" event.
     */
    public function forceDeleted(Transaksi $transaksi): void
    {
        //
    }
}
