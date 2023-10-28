<?php

namespace App\Http\Controllers;
use App\Models\KasPerjalanan;
use App\Models\SuratPerintahJalan;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PenggunaanBus;
use Carbon\Carbon;
use Illuminate\Http\Request;


class SuratPerintahJalanController extends Controller
{
    public function store(Request $request)
    {
        $bus = PenggunaanBus::findOrFail($request->bus_id);
        $nomorSPJ = $bus->id.'/'.'TGU'.'/'. numberToRoman(Carbon::now()->month) . '/'. Carbon::now()->year ;

        $dataSPJ = [
            'penggunaan_bus_id' => $request->bus_id,
            'nomor_spj' => $nomorSPJ,
            'alamat_jemput' => $request->alamat_jemput,
            'stand_by' => $request->stand_by,
        ];

        $suratPerintahJalan = SuratPerintahJalan::create($dataSPJ);

        $dataKasPerjalanan = [
            'surat_perintah_jalan_id' => $suratPerintahJalan->id,
            'driver1_kas' => $request->driver1_kas,
            'driver2_kas' => $request->driver2_kas,
            'co_driver_kas' => $request->co_driver_kas,
            'solar_kas' => $request->solar_kas,
            'lain_lain_kas' => $request->lain_lain_kas,
            'total' => $request->driver1_kas + $request->driver2_kas + $request->co_driver_kas + $request->solar_kas + $request->lain_lain_kas,
        ];

        $dataTransaksi = [
            'tanggal' => Carbon::now(),
            'jenis_transaksi' => 'bus',
            'deskripsi' => $bus->pemesanBus->nama_pemesan,
            'kredit' => $dataKasPerjalanan['total'],
        ];

        KasPerjalanan::create($dataKasPerjalanan);
        Transaksi::create($dataTransaksi);

        return back();
    }
    public function show($id)
    {
        $spj = PenggunaanBus::findOrFail($id);
//        return view ('surat_perintah_jalan.spj_pdf', compact('spj'));
        $pdf = PDF::loadView('surat_perintah_jalan.spj_pdf', compact('spj'));
        return $pdf->stream('surat_perintah_jalan' . $spj->id . '.pdf');
    }
}
