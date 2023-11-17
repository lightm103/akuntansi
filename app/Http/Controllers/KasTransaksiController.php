<?php

namespace App\Http\Controllers;

use App\Services\Transaksi\TransaksiService;
use Illuminate\Http\Request;

class KasTransaksiController extends Controller
{
    protected $transaksiService;

    public function __construct(TransaksiService $transaksiService)
    {
        $this->transaksiService = $transaksiService;
    }


    public function index()
    {
        $data = $this->transaksiService->getTransaksiByGroup();
        $dataKas = [];
        foreach ($data as $item) {
                $dataKas[] = $item;
        }
        dd($dataKas);


        return view('transaksi.kas.index', compact('data'));
    }
}
