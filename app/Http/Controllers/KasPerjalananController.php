<?php

namespace App\Http\Controllers;

use App\Models\KasPerjalanan;
use App\Models\SuratPerintahJalan;
use Illuminate\Http\Request;

class KasPerjalananController extends Controller
{
    public function create(SuratPerintahJalan $spj)
    {
        return view('kas_perjalanan.create', compact('spj'));
    }

    public function store(Request $request, SuratPerintahJalan $spj)
    {
        $data = $request->validate([
            'driver1_kas' => 'required|numeric',
            'driver2_kas' => 'nullable|numeric',
            'co_driver_kas' => 'nullable|numeric',
            'solar' => 'required|numeric'
        ]);

        $spj->kasPerjalanan()->create($data);
        
        return redirect()->route('surat_perintah_jalan.show', $spj->id)
                         ->with('success', 'Kas Perjalanan berhasil ditambahkan.');
    }

    public function edit(SuratPerintahJalan $spj)
    {
        $kas = $spj->kasPerjalanan;
        return view('kas_perjalanan.edit', compact('spj', 'kas'));
    }

    public function update(Request $request, SuratPerintahJalan $spj)
    {
        $data = $request->validate([
            'driver1_kas' => 'required|numeric',
            'driver2_kas' => 'required|numeric',
            'co_driver_kas' => 'required|numeric',
            'solar' => 'required|numeric'
        ]);

        $spj->kasPerjalanan()->update($data);
        
        return redirect()->route('surat_perintah_jalan.show', $spj->id)
                         ->with('success', 'Kas Perjalanan berhasil diperbarui.');
    }

    public function destroy(SuratPerintahJalan $spj)
    {
        $spj->kasPerjalanan()->delete();
        return back()->with('success', 'Kas Perjalanan berhasil dihapus.');
    }
}
