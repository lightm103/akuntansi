<?php

namespace App\Observers;

use App\Models\PemesanBus;
use App\Models\SuratPerintahJalan;
use App\Models\Transaksi;
use App\Models\TransaksiTravel;
use App\Services\Transaksi\TransaksiService;
use App\Services\TransaksiTravel\TransaksiTravelService;

class SuratPerintahJalanObserver
{
    protected $transaksiService;
    protected $transaksiTravelService;

    public function __construct(TransaksiService $transaksiService, TransaksiTravelService $transaksiTravelService)
    {
        $this->transaksiService = $transaksiService;
        $this->transaksiTravelService = $transaksiTravelService;
    }


    /**
     * Handle the SuratPerintahJalan "created" event.
     */
    public function created(SuratPerintahJalan $suratPerintahJalan): void
    {
        $penggunaanBus = $suratPerintahJalan->penggunaanBus()->first();
        $pemesanBus = $penggunaanBus->pemesanBus()->first();

        $data = [
            'pemesan_bus_id' => $pemesanBus->id,
            'tanggal_transaksi' => $suratPerintahJalan->created_at,
            'deskripsi_transaksi' => 'Pengeluaran Travel ' . $pemesanBus->nama_pemesan,
            'jenis_transaksi_id' => '8',
            'jumlah' => $suratPerintahJalan->biaya_driver1 + $suratPerintahJalan->biaya_driver2 + $suratPerintahJalan->biaya_codriver + $suratPerintahJalan->biaya_solar + $suratPerintahJalan->biaya_lainnya,
        ];

        $this->transaksiTravelService->create($data);
    }

    /**
     * Handle the SuratPerintahJalan "updated" event.
     */
    public function updated(SuratPerintahJalan $suratPerintahJalan): void
    {
        $penggunaanBus = $suratPerintahJalan->penggunaanBus()->first();
        $pemesanBus = $penggunaanBus->pemesanBus()->first();

        $data = [
            'jumlah' => $suratPerintahJalan->biaya_driver1 + $suratPerintahJalan->biaya_driver2 + $suratPerintahJalan->biaya_codriver + $suratPerintahJalan->biaya_solar + $suratPerintahJalan->biaya_lainnya,
        ];

        $transaksiTravel = $pemesanBus->transaksiTravel()->where('jenis_transaksi_id', 8)->first();
        $transaksiTravel->save($data);

        $transaksi = $transaksiTravel->transaksi;
        $transaksi->jumlah = $transaksiTravel->jumlah;
        $transaksi->save();
        $transaksiTravel = $pemesanBus->transaksiTravel()->where('jenis_transaksi_id', 8)->first();
        if ($transaksiTravel) {
            $transaksiTravel->update($data); // Menggunakan method update() yang lebih sesuai
    
            $transaksi = $transaksiTravel->transaksi;
            if ($transaksi) {
                $transaksi->update(['jumlah' => $transaksiTravel->jumlah]); // Update jumlah pada Transaksi
            }
        }
    }

    /**
     * Handle the SuratPerintahJalan "deleted" event.
     */
    public function deleted(SuratPerintahJalan $suratPerintahJalan): void
    {
        //
    }

    /**
     * Handle the SuratPerintahJalan "restored" event.
     */
    public function restored(SuratPerintahJalan $suratPerintahJalan): void
    {
        //
    }

    /**
     * Handle the SuratPerintahJalan "force deleted" event.
     */
    public function forceDeleted(SuratPerintahJalan $suratPerintahJalan): void
    {
        //
    }
}
