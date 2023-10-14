<?php

namespace App\Http\Controllers;

use App\Models\PenggunaanBus;
use Illuminate\Http\Request;

class PenggunaanBusController extends Controller
{
    public function index()
    {
        $dataBuses = PenggunaanBus::all();
        return view('penggunaanbus.index', compact('dataBuses'));
    }

    public function create()
    {
        return view('penggunaanbus.create');
    }

    public function store(Request $request)
    {
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

        PenggunaanBus::create($data);
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
