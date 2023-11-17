<?php

namespace App\Observers;

use App\Models\PemesanBus;

class PemesanBusObserver
{
    /**
     * Handle the PemesanBus "created" event.
     */
    public function created(PemesanBus $pemesanBus)
    {
        if ($pemesanBus->biaya_dp > 0) {
            try {
                $data = [
                    'pemesan_bus_id' => $pemesanBus->id,
                    'tanggal_transaksi' => $pemesanBus->created_at,
                    'deskripsi_transaksi' => 'Uang DP dari ' . $pemesanBus->nama_pemesan,
                    'jenis_transaksi_id' => '7',
                    'jumlah' => $pemesanBus->biaya_dp,
                ];

                $pemesanBus->transaksiTravel()->create($data);
            } catch (\Throwable $e) {
                return false;
            }
        }
    }

    /**
     * Handle the PemesanBus "updated" event.
     */
    public function updated(PemesanBus $pemesanBus)
    {
        if ($pemesanBus->biaya_dp > 0) {
            $transaksiTravel = $pemesanBus->transaksiTravel()->where('jenis_transaksi_id', 7)->first();
            if (is_null($transaksiTravel))
            {
                $data = [
                    'pemesan_bus_id' => $pemesanBus->id,
                    'tanggal_transaksi' => $pemesanBus->created_at,
                    'deskripsi_transaksi' => 'Uang DP dari ' . $pemesanBus->nama_pemesan,
                    'jenis_transaksi_id' => '7',
                    'jumlah' => $pemesanBus->biaya_dp,
                ];
                $pemesanBus->transaksiTravel()->create($data);
            } else {
                $transaksiTravel->jumlah = $pemesanBus->biaya_dp;
                $transaksiTravel->save();

                $transaksi = $transaksiTravel->transaksi()->where('jenis_transaksi_id', 7)->first();
                $transaksi->jumlah = $pemesanBus->biaya_dp;
                $transaksi->save();
            }
        } else {
            $transaksiTravel = $pemesanBus->transaksiTravel()->where('jenis_transaksi_id', 7)->first();
            $transaksiTravel->delete();
        }
    }

    /**
     * Handle the PemesanBus "deleted" event.
     */
    public function deleted(PemesanBus $pemesanBus): void
    {
        //
    }

    /**
     * Handle the PemesanBus "restored" event.
     */
    public function restored(PemesanBus $pemesanBus): void
    {
        //
    }

    /**
     * Handle the PemesanBus "force deleted" event.
     */
    public function forceDeleted(PemesanBus $pemesanBus): void
    {
        //
    }
}
