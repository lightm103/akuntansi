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
        $query = Transaksi::select('tanggal', 'jenis_transaksi', 'deskripsi', 'debit', 'kredit')
            ->whereYear('tanggal', $this->year)
            ->whereMonth('tanggal', $this->month)
            ->get();

        $transactions = $query->map(function ($item, $key) {
            $data = [
                'no' => $key + 1,
                'tanggal' => $item->tanggal,
                'jenis_transaksi' => $item->jenis_transaksi,
                'deskripsi' => $item->deskripsi,
                'debit' => $item->debit,
                'kredit' => $item->kredit,
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
