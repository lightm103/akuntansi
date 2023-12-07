<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }
    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_booking' => 'required',
            'tgl_pesan' => 'required',
            'tgl_pemakaian' => 'required',
            'nama_penyewa' => 'required',
            'tujuan_wisata' => 'required',
            'jumlah_unit' => 'required|integer',
            'rute' => 'required',
            'alamat_jemput' => 'required',
            'contact_person' => 'required',
            'harga' => 'required|string',
            'pembayaran' => 'required|string',
            'sisa' => 'required|string',
        ]);
        $request['harga'] = intval(str_replace(",", "", $request['harga']));
        $request['pembayaran'] = intval(str_replace(",", "", $request['pembayaran']));
        $request['sisa'] = intval(str_replace(",", "", $request['sisa']));
        Invoice::create($request->all());

        return redirect()->route('invoice.index')->with('success', 'Invoice berhasil ditambahkan.');
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return redirect()->route('invoice.index')->with('error', 'Invoice tidak ditemukan.');
        }

        return view('invoices.show', compact('invoice'));
    }

    public function edit($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return redirect()->route('invoice.index')->with('error', 'Invoice tidak ditemukan.');
        }

        return view('invoices.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_booking' => 'required',
            'tgl_pesan' => 'required',
            'tgl_pemakaian' => 'required',
            'nama_penyewa' => 'required',
            'tujuan_wisata' => 'required',
            'jumlah_unit' => 'required|integer',
            'rute' => 'required',
            'alamat_jemput' => 'required',
            'contact_person' => 'required',
            'harga' => 'required|string',
            'pembayaran' => 'required|string',
            'sisa' => 'required|string',
        ]);
        $request['harga'] = intval(str_replace(",", "", $request['harga']));
        $request['pembayaran'] = intval(str_replace(",", "", $request['pembayaran']));
        $request['sisa'] = intval(str_replace(",", "", $request['sisa']));
        $invoice = Invoice::find($id);
        $invoice->update($request->all());
        return redirect()->route('invoice.show', $invoice->id)->with('success', 'Invoice berhasil diperbarui.');
    }

    public function downloadPDF($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return redirect()->route('invoice.index')->with('error', 'Invoice tidak ditemukan.');
        }

        $pdf = PDF::loadView('invoices.pdf', compact('invoice')); // Membuat instance PDF

        return $pdf->download('invoice.pdf'); // Menggunakan instance PDF untuk meng-generate PDF
    }

    public function destroy($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return redirect()->route('invoice.index')->with('error', 'Invoice tidak ditemukan.');
        }

        $invoice->delete();

        return redirect()->route('invoice.index')->with('success', 'Invoice berhasil dihapus.');
    }
}
