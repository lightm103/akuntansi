<?php

namespace App\Http\Controllers;

use App\Models\PemesanBus;
use App\Models\PenggunaanBus;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenggunaanBusController extends Controller
{
    public function index()
    {
        $dataBuses = PenggunaanBus::all();
        $pemesanBus = PemesanBus::all();

        return view('penggunaanbus.index', compact('dataBuses', 'pemesanBus'));
    }

    public function create()
    {
        return view('penggunaanbus.create');
    }

    public function store(Request $request)
    {
        $pemesan = PemesanBus::findOrFail($request['pemesanbus_id']);
        $data = $request->validate([
            'pemesanbus_id' => 'required',
            'uang_masuk' => 'required',
            'driver1' => 'required',
            'driver2' => 'required',
            'co_driver' => 'required',
            'no_polisi' => 'required',
        ]);
        $data['pemesanbus_id'] = $pemesan->id;

        $dataTransaksi = [
            'tanggal' => Carbon::now(),
            'jenis_transaksi' => 'bus',
            'deskripsi' => 'Uang Masuk dari '. $pemesan->nama_pemesan,
            'debit' => $data['uang_masuk'],
        ];

        PenggunaanBus::create($data);
        Transaksi::create($dataTransaksi);
        return redirect()->route('penggunaanbus.index')->with('success', 'Data Bus Berhasil Disimpan');
    }

    public function edit($id)
    {
        $bus = PenggunaanBus::findOrFail($id);
        return view('penggunaanbus.edit', compact('bus'));
    }

    public function update(Request $request, $id)
    {
        $bus = PenggunaanBus::findOrFail($id);

        $data = $request->validate([
            'nama_pemesan' => 'required',
            'tanggal_berangkat' => 'required|date',
            'tanggal_pulang' => 'nullable|date',
            'biaya_sewa' => 'required|numeric',
            'uang_masuk' => 'required|numeric|min:0',
            'driver1' => 'required',
            'driver2' => 'required',
            'co_driver' => 'required',
            'no_polisi' => 'required',
            'tujuan' => 'required',
            'no_telp' => 'required',
        ]);

        $bus->update($data);

        return redirect()->route('penggunaanbus.show', $bus->id)->with('success', 'Data Bus Berhasil di Perbarui');
    }

    public function show($id)
    {
        $bus = PenggunaanBus::findOrFail($id);
        return view('penggunaanbus.show', compact('bus'));
    }

    public function destroy($id)
    {
        $bus = PenggunaanBus::findOrFail($id);
        $bus->delete();
        return redirect()->route('penggunaanbus.index')->with('success', 'Data Bus Berhasil di Hapus');
    }
}
