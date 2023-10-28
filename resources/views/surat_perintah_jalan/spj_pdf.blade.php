<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Surat Perintah Jalan</title>
    <style>
        /* Anda bisa menambahkan style sesuai kebutuhan disini */
        .header {
            text-align: center;
        }

        .header hr {
            border-top: 1px solid black;
        }

        .content {
            margin-left: 3em;
            margin-right: 3em;
        }
    </style>
</head>

<body>

<div class="header">
    <img src="./assets/images/logos/logo-header.png" style="width: 350px; height: auto;" alt="">
    <h3>Kontraktor dan Transportasi</h3>
    <hr>
    <h3>Surat Perintah Jalan</h3>
    <p>Nomor: {{ $spj->suratPerintahJalan->nomor_spj }}</p>
</div>

<div class="content">
    <table style="width: 70%">
        <tr>
            <td colspan="2"><h4>IDENTITAS CREW & KENDARAAN</h4></td>
        </tr>
        <tr>
            <td style="width: 30%">Driver 1</td>
            <td>: {{ $spj->driver1 }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Driver 2</td>
            <td>: {{ $spj->driver2 }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Co Driver</td>
            <td>: {{ $spj->co_driver }}</td>
        </tr>
        <tr>
            <td style="width: 30%">No. Polisi</td>
            <td>: {{ $spj->no_polisi }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Tujuan</td>
            <td>: {{ $spj->pemesanBus->tujuan }}</td>
        </tr>
    </table>

    <table style="width: 70%">
        <tr>
            <td colspan="2">
                <h4>PEMESAN</h4>
            </td>
        </tr>
        <tr>
            <td style="width: 30%">Nama Pemesan</td>
            <td>: {{ $spj->pemesanBus->nama_pemesan }}</td>
        </tr>
        <tr>
            <td style="width: 30%">No Telp</td>
            <td>: {{ $spj->pemesanBus->no_telp }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Tanggal Berangkat</td>
            <td>: {{ $spj->pemesanBus->tanggal_berangkat }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Tanggal Pulang</td>
            <td>: {{ $spj->pemesanBus->tanggal_pulang }}</td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td style="width: 30%">Stand by</td>
            <td>: {{ $spj->suratPerintahJalan->stand_by }}</td>
        </tr>
    </table>
    <table style="width: 70%">
        <tr>
            <td colspan="2">
                <h4>KAS PERJALANAN</h4>
            </td>
        </tr>
        <tr>
            <td style="width: 30%">Driver 1</td>
            <td>: {{ format_rupiah($spj->suratPerintahJalan->kasPerjalanan->driver1_kas) }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Driver 2</td>
            <td>: {{ format_rupiah($spj->suratPerintahJalan->kasPerjalanan->driver2_kas) }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Co Driver</td>
            <td>: {{ format_rupiah($spj->suratPerintahJalan->kasPerjalanan->co_driver_kas) }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Solar</td>
            <td>: {{ format_rupiah($spj->suratPerintahJalan->kasPerjalanan->solar_kas) }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Lain Lain</td>
            <td>: {{ format_rupiah($spj->suratPerintahJalan->kasPerjalanan->lain_lain_kas) }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Total</td>
            <td style="border-top: 1px solid; font-weight: bold">{{ format_rupiah($spj->suratPerintahJalan->kasPerjalanan->total) }}</td>
        </tr>
    </table>
    <table style="width: 100%; margin-top: 4em">
        <tr>
            <td style="width: 50%; text-align: center">
                <br>
                Penerima SPJ</td>
            <td style="width: 50%; text-align: center; ">
                Ciamis, {{ \Illuminate\Support\Carbon::now()->isoFormat('D MMMM Y') }} <br>
                Pembuat SPJ
            </td>
        </tr>
        <tr>
            <td style="height: 100px;"></td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;">
                {{ $spj->driver1 }}
            </td>
            <td style="width: 50%; text-align: center;">
                ...................
            </td>
        </tr>
    </table>
</div>

<!-- Anda bisa menambahkan konten lainnya sesuai kebutuhan -->

</body>
</html>
