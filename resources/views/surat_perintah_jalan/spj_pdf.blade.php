<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Surat Perintah Jalan</title>
    <style>
        /* Anda bisa menambahkan style sesuai kebutuhan disini */
    </style>
</head>

<body>

<div class="header">
    <h2>TARUNA GALUH UTAMA</h2>
    <p>Kontraktor dan Transportasi</p>
    <h3>Surat Perintah Jalan</h3>
    <p>Nomor: {{ $spj->id }}</p>
</div>

<div class="content">
    <h4>IDENTITAS CREW & KENDARAAN</h4>
    <p>Driver 1: {{ $spj->driver1 }}</p>
    <p>Driver 2: {{ $spj->driver2 }}</p>
    <p>Co Driver: {{ $spj->co_driver }}</p>
    <p>No. Polisi: {{ $spj->no_polisi }}</p>
    <p>Tujuan: {{ $spj->tujuan }}</p>

    <h4>PEMESAN</h4>
    <p>Nama Pemesan: {{ $spj->penggunaanBus->nama_pemesan }}</p>
    <p>No Telp: {{ $spj->no_telp }}</p>
    <p>Tanggal Berangkat: {{ $spj->penggunaanBus->tanggal_berangkat }}</p>
    <p>Tanggal Pulang: {{ $spj->penggunaanBus->tanggal_pulang }}</p>
    <p>Alamat Jemput: {{ $spj->alamat_jemput }}</p>
    <p>Stand by: {{ $spj->stand_by }}</p>
</div>

<!-- Anda bisa menambahkan konten lainnya sesuai kebutuhan -->

</body>
</html>
