<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Style;

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
                'debit' => 'Rp ' . number_format($item->jenisTransaksi->kode_jenis_transaksi == 'debit' ? $item->jumlah : 0, 0, ',', '.') . ',00',
                'kredit' => 'Rp ' . number_format($item->jenisTransaksi->kode_jenis_transaksi == 'kredit' ? $item->jumlah : 0, 0, ',', '.') . ',00',
            ];

            return $data;
        });

        $transactions->all();

        return $transactions;
    }

    public function styles($excel)
    {
        return [
            1 => ['font' => ['size' => 10], 'borders' => ['outline' => ['style' => 'thin']]],
            2 => ['font' => ['size' => 40], 'borders' => ['outline' => ['style' => 'thin']]],
            3 => ['font' => ['size' => 50], 'borders' => ['outline' => ['style' => 'thin']]],
            4 => ['font' => ['size' => 50], 'borders' => ['outline' => ['style' => 'thin']]],
            5 => ['font' => ['size' => 70], 'borders' => ['outline' => ['style' => 'thin']]],
            6 => ['font' => ['size' => 70], 'borders' => ['outline' => ['style' => 'thin']]],
        ];
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
