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

        h4 {
            margin-bottom : 0px;
        }

    </style>
</head>

<body>

<div class="header">
    <img src="./assets/images/logos/logo-header.png" style="width: 350px; height: auto;" alt="">
    <h3 style="margin: 0px;">Kontraktor dan Transportasi</h3>
    <h4 style="margin: 0px;">Jalan Dr. Ciptomangunkusumo nomor 44 B Ciamis</h4>
    <hr>
    <h3 style="margin-bottom: 0px;">Surat Perintah Jalan</h3>
    <span>Nomor: {{ $spj->nomor_spj }}</span>
</div>

<div class="content">
    <table style="width: 70%">
        <tr>
            <td colspan="2"><h4>IDENTITAS CREW & KENDARAAN</h4></td>
        </tr>
        <tr>
            <td style="width: 30%">Driver 1</td>
            <td>: {{ $spj->penggunaanBus->driver1 }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Driver 2</td>
            <td>: {{ $spj->penggunaanBus->driver2 }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Co Driver</td>
            <td>: {{ $spj->penggunaanBus->co_driver }}</td>
        </tr>
        <tr>
            <td style="width: 30%">No. Polisi</td>
            <td>: {{ $spj->penggunaanBus->armadaBus->nomor_plat }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Tujuan</td>
            <td>: {{ $spj->penggunaanBus->pemesanBus->tujuan }}</td>
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
            <td>: {{ $spj->penggunaanBus->pemesanBus->nama_pemesan }}</td>
        </tr>
        <tr>
            <td style="width: 30%">No Telp</td>
            <td>: {{ $spj->penggunaanBus->pemesanBus->no_telp }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Tanggal Berangkat</td>
            <td>: {{ $spj->penggunaanBus->pemesanBus->tanggal_berangkat }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Tanggal Pulang</td>
            <td>: {{ $spj->penggunaanBus->pemesanBus->tanggal_pulang }}</td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td style="width: 30%">Stand by</td>
            <td>: {{ $spj->penggunaanBus->pemesanBus->standby }}</td>
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
            <td>: {{ format_rupiah($spj->biaya_driver1) }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Driver 2</td>
            <td>: {{ format_rupiah($spj->biaya_driver2) }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Co Driver</td>
            <td>: {{ format_rupiah($spj->biaya_codriver) }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Solar</td>
            <td>: {{ format_rupiah($spj->biaya_solar) }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Lain Lain</td>
            <td>: {{ format_rupiah($spj->biaya_lainny) }}</td>
        </tr>
        <tr>
            <td style="width: 30%">Total</td>
            <td style="border-top: 1px solid; font-weight: bold">{{ format_rupiah($spj->total) }}</td>
        </tr>
    </table>
    <table style="width: 100%; margin-top: 4em">
        <tr>
            <td style="width: 50%; text-align: center">
                <br>
                Penerima SPJ</td>
            <td style="width: 50%; text-align: center; ">
                Ciamis, {{ $spj->created_at->isoFormat('D MMMM Y') }} <br>
                Pembuat SPJ
            </td>
        </tr>
        <tr>
            <td style="width: 50%; height: 50px;"></td>
            <td style="width: 50%; text-align: center;">
                <img src="./assets/images/tandatangan.png" alt="" style="margin: 0px;">
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: center;">
                <b>{{ $spj->penggunaanBus->driver1 }}</b>
            </td>
            <td style="width: 50%; text-align: center;">
                <b>Aep,SH.,MH.</b>
            </td>
        </tr>
    </table>
</div>

<!-- Anda bisa menambahkan konten lainnya sesuai kebutuhan -->

</body>
</html>
