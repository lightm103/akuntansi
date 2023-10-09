<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::all();
        $projects = Project::all();
        return view('pengeluaran.index', compact('pengeluarans', 'projects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|integer|exists:projects,id',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required|string',
        ]);

        // Kurangi jumlah uang dari proyek
        $project = Project::find($validatedData['project_id']);

        // Anda bisa mengurangkan dari uang muka atau uang pinjaman sesuai dengan kebutuhan Anda.
        // Di contoh ini saya mengurangkan dari uang_muka:
        $project->uang_muka -= $validatedData['jumlah'];
        $project->save();

        Pengeluaran::create($validatedData);

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil ditambahkan!');
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|integer|exists:projects,id',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required|string',
        ]);

        $pengeluaran->update($validatedData);

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil diperbarui!');
    }

    public function show(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.show', compact('pengeluaran'));
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        $projects = Project::all();
        return view('pengeluaran.edit', compact('pengeluaran', 'projects'));
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dihapus!');
    }
}
