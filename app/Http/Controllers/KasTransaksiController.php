<?php

namespace App\Http\Controllers;

use App\Services\Transaksi\TransaksiService;
use App\Services\TransaksiProject\TransaksiProjectService;
use App\Services\TransaksiTravel\TransaksiTravelService;
use Illuminate\Http\Request;

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
        $transaksiProject = $this->transaksiProjectService->getGroupByProject();
        $transaksiTravel = $this->transaksiTravelService->getGroupByProject();
        $dataTravel = $transaksiTravel->map(function ($item){
            $pemasukanTravel = $item[0]->whereRelation('jenisTransaksi', 'kode_jenis_transaksi', 'debit')->get();
            $pengeluaranTravel = $item[0]->whereRelation('jenisTransaksi', 'kode_jenis_transaksi', 'kredit')->get();
            return [
                'transaksi' => $item[0]->pemesanBus->nama_pemesan,
                'jenis_transaksi' => 'Travel',
                'pemasukan' => $pemasukanTravel->sum('jumlah'),
                'pengeluaran' => $pengeluaranTravel->sum('jumlah'),
            ];
        });

        $dataProject = $transaksiProject->map(function ($item){
            $pemasukanProject = $item[0]->whereRelation('jenisTransaksi', 'kode_jenis_transaksi', 'debit')->get();
            $pengeluaranProject = $item[0]->whereRelation('jenisTransaksi', 'kode_jenis_transaksi', 'kredit')->get();

            return [
                'transaksi' => $item[0]->projects->name,
                'jenis_transaksi' => 'Proyek',
                'pemasukan' => $pemasukanProject->sum('jumlah'),
                'pengeluaran' => $pengeluaranProject->sum('jumlah'),
            ];
        });

        $data = $dataTravel->merge($dataProject);
        $data->all();

        return view('transaksi.kas.index', compact('data'));
    }
}
