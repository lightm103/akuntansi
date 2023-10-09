<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\PenggunaanBus;

class SuratPerintahJalanController extends Controller
{
    public function show($id)
    {
        $bus = PenggunaanBus::findOrFail($id);
        $pdf = PDF::loadView('surat_perintah_jalan', compact('bus'));
        return $pdf->stream('surat_perintah_jalan_' . $bus->id . '.pdf');
    }
}
