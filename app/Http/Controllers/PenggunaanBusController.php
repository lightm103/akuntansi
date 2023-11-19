<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePengguaanBusRequest;
use App\Http\Requests\UpdatePengguaanBusRequest;
use App\Models\PemesanBus;
use App\Models\PenggunaanBus;
use App\Models\Transaksi;
use App\Services\ArmadaBus\ArmadaBusService;
use App\Services\PemesanBus\PemesanBusService;
use App\Services\PenggunaanBus\PenggunaanBusServiceImplement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenggunaanBusController extends Controller
{
    protected $penggunaanBusService;
    protected $pemesanBusService;
    protected $armadaBusServices;

    public function __construct(PenggunaanBusServiceImplement $penggunaanBusService, PemesanBusService $pemesanBusService, ArmadaBusService $armadaBusService)
    {
        $this->penggunaanBusService = $penggunaanBusService;
        $this->pemesanBusService = $pemesanBusService;
        $this->armadaBusServices = $armadaBusService;
    }

    public function index()
    {
        $dataBuses = $this->penggunaanBusService->all();
        $pemesanBus = $this->pemesanBusService->getNotExistsRelation();
        $armadaBus = $this->armadaBusServices->getBusAvailable();

        return view('penggunaanbus.index', compact('dataBuses', 'pemesanBus', 'armadaBus'));
    }

    public function create()
    {
        return view('penggunaanbus.create');
    }

    public function store(StorePengguaanBusRequest $request)
    {
        $data = $request->validated();
        $this->penggunaanBusService->create($data);

        return redirect()->route('penggunaanbus.index')->with('success', 'Data Bus Berhasil Disimpan');
    }

    public function edit($id)
    {

    }

    public function update(UpdatePengguaanBusRequest $request, $id)
    {
        $data = $request->validated();
        $this->penggunaanBusService->update($id, $data);

        return redirect()->back()->with('success', 'Data Bus Berhasil di Perbarui');
    }

    public function show($id)
    {
        $bus = $this->penggunaanBusService->findOrFail($id);
        $pemesanBus = $this->pemesanBusService->all();
        $armadaBus = $this->armadaBusServices->all();

        return view('penggunaanbus.show', compact('bus', 'pemesanBus', 'armadaBus'));
    }

    public function destroy($id)
    {
        $this->penggunaanBusService->delete($id);

        return redirect()->back()->with('success', 'Data Bus Berhasil di Hapus');
    }
}
