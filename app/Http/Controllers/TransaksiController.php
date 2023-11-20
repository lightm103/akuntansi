<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use App\Models\PemesanBus;
use App\Models\Project;
use App\Models\Transaksi;
use App\Services\PemesanBus\PemesanBusService;
use App\Services\Transaksi\TransaksiService;
use App\Services\TransaksiProject\TransaksiProjectService;
use App\Services\TransaksiTravel\TransaksiTravelService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    protected $transaksiService;
    protected $pemesanBusService;
    protected $transaksiTravelService;
    protected $transaksiProjectService;

    public function __construct(TransaksiService $transaksiService, PemesanBusService $pemesanBusService, TransaksiProjectService $transaksiProjectService, TransaksiTravelService $transaksiTravelService)
    {
        $this->transaksiService = $transaksiService;
        $this->pemesanBusService = $pemesanBusService;
        $this->transaksiProjectService = $transaksiProjectService;
        $this->transaksiTravelService = $transaksiTravelService;
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
            'tanggal_transaksi' => 'required',
            'jenis_transaksi' => 'required',
            'transaksi_travel_id' => 'string',
            'transaksi_project_id' => 'string',
            'deskripsi_transaksi' => 'required',
            'jumlah' => 'required',
        ]);

        if ($validated['jenis_transaksi'] == 'bus') {
            $validated['jenis_transaksi_id'] = 2;
            $validated['pemesan_bus_id'] = $validated['transaksi_travel_id'];

            $this->transaksiTravelService->create($validated);
        } elseif ($validated['jenis_transaksi'] == 'proyek') {
            $validated['jenis_transaksi_id'] = 4;
            $validated['projects_id'] = $validated['transaksi_project_id'];

            $this->transaksiProjectService->create($validated);
        } else {
            $validated['jenis_transaksi_id'] = 6;
            $this->transaksiService->create($validated);
        }

        return back();
    }

    public function pemasukan(Request $request)
    {
        $validated = $request->validate([
            'tanggal_transaksi' => 'required',
            'jenis_transaksi' => 'required',
            'transaksi_travel_id' => 'string',
            'transaksi_project_id' => 'string',
            'deskripsi_transaksi' => 'required',
            'jumlah' => 'required',
        ]);

        if ($validated['jenis_transaksi'] == 'bus') {
            $validated['jenis_transaksi_id'] = 1;
            $validated['pemesan_bus_id'] = $validated['transaksi_travel_id'];

            $this->transaksiTravelService->create($validated);
        } elseif ($validated['jenis_transaksi'] == 'proyek') {
            $validated['jenis_transaksi_id'] = 3;
            $validated['projects_id'] = $validated['transaksi_project_id'];

            $this->transaksiProjectService->create($validated);
        } else {
            $validated['jenis_transaksi_id'] = 5;
            $this->transaksiService->create($validated);
        }

        return back();
    }

    public function exportByMonth(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $fileName = 'Report_' . $month . '_' . $year . '.xlsx';

        return (new TransaksiExport($month, $year))->download($fileName);
    }
}
