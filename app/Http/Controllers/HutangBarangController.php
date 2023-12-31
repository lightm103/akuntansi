<?php

namespace App\Http\Controllers;

use App\Models\HutangBarang;
use Illuminate\Http\Request;

class HutangBarangController extends Controller
{
    public function index(Request $request)
    {
        $query = HutangBarang::query();

        if ($request->has('nama_barang')) {
            $query->where('nama_barang', 'like', '%' . $request->nama_barang . '%');
        }

        if ($request->has('nama_toko')) {
            $query->where('nama_toko', 'like', '%' . $request->nama_toko . '%');
        }

        $hutangBarangs = $query->get();

        return view('hutang.index', compact('hutangBarangs'));
    }

    public function create()
    {
        return view('hutang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'total_uang' => 'required|numeric',
            'nama_toko' => 'required',
            'status' => 'required|in:lunas,belum_lunas'
        ]);

        HutangBarang::create($request->all());

        return redirect()->route('hutang.index')->with('success', 'Hutang barang berhasil ditambahkan!');
    }

    public function edit(HutangBarang $hutangBarang)
    {
        return view('hutang.edit', compact('hutangBarang'));
    }

    public function destroy(HutangBarang $hutangBarang)
    {
        $hutangBarang->delete();

        return redirect()->route('hutang.index')->with('success', 'Hutang barang berhasil dihapus!');
    }
    public function update(Request $request, $id)
    {
        $hutangBarang = HutangBarang::where('id', $id)->first();
        $data = [
            'status' => $request['status']
        ];
        $hutangBarang->update($data);

        return redirect()->route('hutang.index')->with('success', 'Hutang barang berhasil diperbarui!');
    }
}
