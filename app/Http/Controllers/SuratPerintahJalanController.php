<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreSuratPerintahJalanRequest;
use App\Http\Requests\UpdateSuratPerintahJalanRequest;
use App\Models\KasPerjalanan;
use App\Models\SuratPerintahJalan;
use App\Models\Transaksi;
use App\Services\SuratPerintahJalan\SuratPerintahJalanService;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PenggunaanBus;
use Carbon\Carbon;
use Illuminate\Http\Request;


class SuratPerintahJalanController extends Controller
{
    protected $suratPerintahJalanService;

    public function __construct(SuratPerintahJalanService $suratPerintahJalanService)
    {
        $this->suratPerintahJalanService = $suratPerintahJalanService;
    }

    public function store(StoreSuratPerintahJalanRequest $request)
    {
        $nomorSPJ = $request['bus_id'] .'/'.'TGU'.'/'. numberToRoman(Carbon::now()->month) . '/'. Carbon::now()->year ;
        $data = $request->validated();

        // Set Data
        $data['penggunaan_bus_id'] = $request['bus_id'];
        $data['nomor_spj'] = $nomorSPJ;

        $this->suratPerintahJalanService->create($data);

        return back()->with('Success', 'Surat Perintah Jalan Berhasil di Buat!');
    }
    public function show($id)
    {
        $spj = $this->suratPerintahJalanService->findByIdPenggunaBus($id);

        // Set Data
        $spj['total'] = $spj['biaya_driver1'] + $spj['biaya_driver2'] + $spj['biaya_codriver']  + $spj['biaya_solar'] + $spj['biaya_lainnya'] ;

        $pdf = PDF::loadView('surat_perintah_jalan.spj_pdf', compact('spj'));
        return $pdf->download('surat_perintah_jalan' . $spj->id . '.pdf');
    }

    public function update($id, UpdateSuratPerintahJalanRequest $request)
    {
        $data = $request->validated();
        dd($data);

        $this->suratPerintahJalanService->update($id, $data);

        return redirect()->back()->with('Success', 'Surat Perintah Jalan Berhasil di Update');
    }
}
