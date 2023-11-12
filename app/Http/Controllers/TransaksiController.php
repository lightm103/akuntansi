<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use App\Models\PemesanBus;
use App\Models\Project;
use App\Models\Transaksi;
use App\Services\PemesanBus\PemesanBusService;
use App\Services\Transaksi\TransaksiService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    protected $transaksiService;
    protected $pemesanBusService;

    public function __construct(TransaksiService $transaksiService, PemesanBusService $pemesanBusService) {
        $this->transaksiService = $transaksiService;
        $this->pemesanBusService = $pemesanBusService;
    }
    public function index()
    {
        $transactions = $this->transaksiService->all();
        $projects = Project::all();
        $travels = $this->pemesanBusService->all();
        $month = Transaksi::select('tanggal_transaksi')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->tanggal)->format('m');
            });
        $years = Transaksi::select('tanggal_transaksi')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->tanggal)->format('Y');
            });

        return view('transaksi.index', compact('transactions', 'projects', 'travels', 'month', 'years'));
    }

public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return back();
    }

    public function pengeluaran(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required',
            'jenis_transaksi' => 'required',
            'deskripsi' => 'required',
            'kredit' => 'required',
        ]);

        Transaksi::create($validated);

        return back();
    }

    public function pemasukan(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required',
            'jenis_transaksi' => 'required',
            'deskripsi' => 'required',
            'debit' => 'required',
        ]);

        Transaksi::create($validated);

        return back();
    }

    public function exportByMonth(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $fileName = 'Report_'.$month.'_'.$year.'.xlsx';

        return (new TransaksiExport($month, $year))->download($fileName);
    }
}
