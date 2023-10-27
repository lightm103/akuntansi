<?php

namespace App\Http\Controllers;

use App\Models\PemesanBus;
use App\Models\Project;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transactions = Transaksi::all();
        $projects = Project::all();
        $travels = PemesanBus::all();
        return view('transaksi.index', compact('transactions', 'projects', 'travels'));
    }

    public function pengeluaran(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required',
            'jenis_transaksi' => 'required',
            'deskripsi' => 'required',
            'kredit' => 'required',
        ]);



        Transaksi::create($validated);

        return back();
    }

    public function pemasukan(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required',
            'jenis_transaksi' => 'required',
            'deskripsi' => 'required',
            'debit' => 'required',
        ]);

        Transaksi::create($validated);

        return back();
    }
}
