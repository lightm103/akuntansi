<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings
{
    use Exportable;

    private $month;
    private $year;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function collection()
    {
        $query = Transaksi::select('tanggal_transaksi', 'jenis_transaksi_id', 'deskripsi_transaksi', 'jumlah')
            ->whereYear('tanggal_transaksi', $this->year)
            ->whereMonth('tanggal_transaksi', $this->month)
            ->get();

        $transactions = $query->map(function ($item, $key) {
            $data = [
                'no' => $key + 1,
                'tanggal' => $item->tanggal_transaksi,
                'jenis_transaksi' => $item->jenisTransaksi->nama_jenis_transaksi,
                'deskripsi' => $item->deskripsi_transaksi,
                'debit' => number_format($item->jenisTransaksi->kode_jenis_transaksi == 'debit' ? $item->jumlah : 0 , 2, ',', '.'),
                'kredit' => number_format($item->jenisTransaksi->kode_jenis_transaksi == 'debit' ? $item->jumlah : 0 , 2, ',', '.'),
            ];

            return $data;
        });

        $transactions->all();

        return $transactions;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tanggal',
            'Jenis Transaksi',
            'Keterangan',
            'Pemasukan',
            'Pengeluaran',
        ];
    }
}
