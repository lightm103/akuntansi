<?php

namespace App\Http\Controllers;

use App\Models\HutangUang;
use Illuminate\Http\Request;

class HutangUangController extends Controller
{
    public function index(Request $request)
    {
        $query = HutangUang::query();

        if ($request->has('nama_pemberi')) {
            $query->where('nama_pemberi', 'like', '%' . $request->nama_pemberi . '%');
        }

        if ($request->has('keterangan')) {
            $query->where('keterangan', 'like', '%' . $request->keterangan . '%');
        }

        $hutangUangs = $query->get();

        return view('hutanguang.index', compact('hutangUangs'));
    }

    public function create()
    {
        return view('hutanguang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemberi' => 'required',
            'jumlah_uang' => 'required|numeric',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:lunas,belum_lunas'
        ]);

        HutangUang::create($request->all());

        return redirect()->route('hutanguang.index')->with('success', 'Hutang uang berhasil ditambahkan!');
    }

    public function edit(HutangUang $hutangUang)
    {
        return view('hutanguang.edit', compact('hutangUang'));
    }

    public function destroy(HutangUang $hutangUang)
    {
        $hutangUang->delete();

        return redirect()->route('hutanguang.index')->with('success', 'Hutang uang berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        $hutangUang = HutangUang::where('id', $id)->first();
        $data = [
            'status' => $request['status']
        ];
        $hutangUang->update($data);

        return redirect()->route('hutanguang.index')->with('success', 'Hutang uang berhasil diperbarui!');
    }
}
