<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ArmadaBus;
use App\Models\JenisTransaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $armadas = [
            [
                'name' => 'Bus 1',
                'jenis_bus' => 'Mini Bus',
                'nomor_plat' => 'Z 9384 KI',
                'status_ketersediaan' => true,
            ],
            [
                'name' => 'Bus 2',
                'jenis_bus' => 'Mini Bus',
                'nomor_plat' => 'Z 93802 JK',
                'status_ketersediaan' => false,
            ],
            [
                'name' => 'Bus 3',
                'jenis_bus' => 'Jet Bus',
                'nomor_plat' => 'Z 1231 TI',
                'status_ketersediaan' => true,
            ]
        ];

        foreach ($armadas as $armada) {
            ArmadaBus::create($armada);
        }

        $jenisTransaksi = [
            [
                'nama_jenis_transaksi' => 'Pemasukan Travel',
                'kode_jenis_transaksi' => 'debit',
            ],
            [
                'nama_jenis_transaksi' => 'Pengeluaran Travel',
                'kode_jenis_transaksi' => 'kredit',
            ],
            [
                'nama_jenis_transaksi' => 'Pemasukan Proyek',
                'kode_jenis_transaksi' => 'debit',
            ],
            [
                'nama_jenis_transaksi' => 'Pengeluaran Proyek',
                'kode_jenis_transaksi' => 'kredit',
            ],
            [
                'nama_jenis_transaksi' => 'Pemasukan Lainnya',
                'kode_jenis_transaksi' => 'debit',
            ],
            [
                'nama_jenis_transaksi' => 'Pengeluaran Lainnya',
                'kode_jenis_transaksi' => 'kredit',
            ],
            [
                'nama_jenis_transaksi' => 'DP Travel',
                'kode_jenis_transaksi' => 'debit',
            ],
            [
                'nama_jenis_transaksi' => 'Operasional Bus',
                'kode_jenis_transaksi' => 'kredit',
            ]
        ];

        foreach ( $jenisTransaksi as $item )
        {
            JenisTransaksi::create($item);
        }
    }
}
