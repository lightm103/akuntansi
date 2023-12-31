<?php

namespace App\Http\Controllers;

use App\Services\Transaksi\TransaksiService;
use App\Services\TransaksiProject\TransaksiProjectService;
use App\Services\TransaksiTravel\TransaksiTravelService;
use Illuminate\Http\Request;
use Matrix\Builder;

class KasTransaksiController extends Controller
{
    protected $transaksiService;
    protected $transaksiTravelService;
    protected $transaksiProjectService;

    public function __construct(TransaksiService $transaksiService, TransaksiProjectService $transaksiProjectService, TransaksiTravelService $transaksiTravelService)
    {
        $this->transaksiService = $transaksiService;
        $this->transaksiProjectService = $transaksiProjectService;
        $this->transaksiTravelService = $transaksiTravelService;
    }


    public function index()
    {
        $transaksiProjects = $this->transaksiProjectService->getGroupByProject();
        $transaksiTravels = $this->transaksiTravelService->getGroupByProject();
        $dataTravel = [];
        $dataProject = [];
        foreach ($transaksiTravels as $transaksiTravel) {
            $arrTravel = [];
            foreach ($transaksiTravel as $value) {
                $pemasukanTravel = $value->where('pemesan_bus_id', $value->pemesanBus->id)->whereHas('jenisTransaksi', function ($query) {
                    $query->where('kode_jenis_transaksi', 'debit');
                })->get();
                $pengeluaranTravel = $value->where('pemesan_bus_id', $value->pemesanBus->id)->whereHas('jenisTransaksi', function ($query) {
                    $query->where('kode_jenis_transaksi', 'kredit');
                })->get();

                $arrTravel[] = [
                    'transaksi_travel_id' => $value->pemesan_bus_id,
                    'transaksi_project_id' => null,
                    'transaksi' => $value->pemesanBus->nama_pemesan,
                    'jenis_transaksi' => 'Travel',
                    'pemasukan' => $pemasukanTravel->sum('jumlah'),
                    'pengeluaran' => $pengeluaranTravel->sum('jumlah'),
                ];
            };
            $dataTravel [] = $arrTravel[0];
        }
        foreach ($transaksiProjects as $transaksiProject) {
            $arrProject = [];
            foreach ($transaksiProject as $value) {
                $pemasukanProject = $value->where('projects_id', $value->projects->id)->whereHas('jenisTransaksi', function ($query) {
                    $query->where('kode_jenis_transaksi', 'debit');
                })->get();
                $pengeluaranProject = $value->where('projects_id', $value->projects->id)->whereHas('jenisTransaksi', function ($query) {
                    $query->where('kode_jenis_transaksi', 'kredit');
                })->get();
                $arrProject[] = [
                    'transaksi_travel_id' => null,
                    'transaksi_project_id' => $value->projects_id,
                    'transaksi' => $value->projects->name,
                    'jenis_transaksi' => 'Project',
                    'pemasukan' => $pemasukanProject->sum('jumlah'),
                    'pengeluaran' => $pengeluaranProject->sum('jumlah'),
                ];
            };
            $dataProject[] = $arrProject[0];
        }

        $data = array_merge($dataTravel,$dataProject);
//        dd($data);

        return view('transaksi.kas.index', compact('data'));
    }

    public function detailProject($id)
    {
        $data = $this->transaksiProjectService->getByProjectId($id);

        return view('transaksi.kas.detail.index', compact('data'));
    }

    public function detailTravel($id)
    {
        $data = $this->transaksiTravelService->getByPemesanId($id);

        return view('transaksi.kas.detail.index', compact('data'));
    }
}
