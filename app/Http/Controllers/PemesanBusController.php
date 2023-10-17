<?php

namespace App\Http\Controllers;

use App\Models\PemesanBus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PemesanBusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PemesanBus::all();
        return view('pemesanbus.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pemesan' => 'required',
            'no_telp' => 'required',
            'tanggal_berangkat' => 'required|date',
            'tanggal_pulang' => 'nullable|date',
            'biaya_sewa' => 'required|numeric',
            'tujuan' => 'required',
            'alamat_jemput' => '',
            'standby' => '',
        ]);
        PemesanBus::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pemesanBus = PemesanBus::findOrFail($id);

        return view('pemesanbus.show', compact('pemesanBus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemesanBus $pemesanBus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_pemesan' => 'required',
            'no_telp' => 'required',
            'tanggal_berangkat' => 'required|date',
            'tanggal_pulang' => 'nullable|date',
            'biaya_sewa' => 'required|numeric',
            'tujuan' => 'required',
            'alamat_jemput' => '',
            'standby' => '',
        ]);
        $pemesan = PemesanBus::findOrFail($id);
        $pemesan->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pemesan = PemesanBus::findOrFail($id);
        $pemesan->delete();
        return back();
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getPemesanById($id): \Illuminate\Http\JsonResponse
    {
        $pemesanById = PemesanBus::findOrFail($id);
        return response()->json($pemesanById);
    }
}
