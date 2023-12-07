<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kwitansi Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 15px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .details-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 80px;
        }

        .invoice-details,
        .invoice-table {
            flex: 1;
            padding: 10px;
        }

        .invoice-details {
            margin-right: 10px;
        }

        .bank-account {
            border: 1px solid #000;
            width: 200px;
            height: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .company-info {
            text-align: right;
        }

        .company-logo img {
            width: auto;
            height: 50px;
        }

        .booking-number {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="./assets/images/logos/logo-header.png" style="width: 350px; height: auto;" alt="Company Logo">
        <h3 style="margin: 0px;">Kontraktor dan Transportasi</h3>
        <h4 style="margin: 0px;">Jalan Dr. Ciptomangunkusumo nomor 44 B Ciamis</h4>
        <hr>
        <h3 style="margin-bottom: 0px;">Kwitansi Pemesanan</h3>
    </div>
    <div class="details-container">
        <div class="invoice-details">
            <h4>No. Booking: {{ $invoice->no_booking }}</h4>
            <p>Tanggal Pesan: {{ $invoice->tgl_pesan }}</p>
            <p>Tanggal Pemakaian: {{ $invoice->tgl_pemakaian }}</p>
            <p>Nama Penyewa: {{ $invoice->nama_penyewa }}</p>
            <p>Tujuan Wisata: {{ $invoice->tujuan_wisata }}</p>
            <p>Jumlah Unit: {{ $invoice->jumlah_unit }}</p>
            <p>Rute: {{ $invoice->rute }}</p>
            <p>Alamat Jemput: {{ $invoice->alamat_jemput }}</p>
            <p>Contact Person: {{ $invoice->contact_person }}</p>
        </div>
        <div class="invoice-table">
            <div style="display: flex; flex-direction: column;">
                <p>Harga : {{ format_rupiah($invoice->harga) }}</p>
                <p>Pembayaran : {{ format_rupiah($invoice->pembayaran) }}</p>
                <p>Sisa : {{ format_rupiah($invoice->sisa) }}</p>
            </div>
        </div>
    </div>
    <table style="width:100%">
        <tr>
            <td style="text-align: left;"> <!-- Menambah text-align left untuk bank-account -->
                <div class="bank-account">
                    <p>REKENING BANK(Mandiri)</p>
                    <p>1770018964368</p>
                    <p>Aep Sunendar SH MH</p>
                </div>
            </td>
            <td style="text-align: right;"> <!-- Menambah text-align right untuk company-info -->
                <div class="company-info">
                    <p>Ciamis, {{ $invoice->created_at->isoFormat('D MMMM Y') }}</p>
                    <div class="company-logo" style="padding-right: 10%">
                        <img src="./assets/images/tandatangan.png" alt="Signature">
                    </div>
                    <p>Aep Sunendar SH MH</p>
                </div>
            </td>
        </tr>
    </table>    
    <br>
    <br>
    <br><br><br><br>
    <div>
        <h4>KETENTUAN SEWA</h4>
        <p>- HARGA SUDAH TERMASUK BBM</p>
        <p>- HARGA BELUM TERMASUK BIAYA TOL, PARKIR, TIPS CREW, TIKET WISATA, PENYEBRANGAN FERRY, DLL</p>
        <p>- BOOKING BERLAKU/DIANGGAP SAH APABILA SUDAH MELAKUKAN UANG MUKA/DP MINIMAL 30% DARI TOTAL HARGA SEWA
        </p>
        <p>- SETIAP PEMBATALAN DIKENAKAN BIAYA KLAIM DARI HARGA SEWA BUS/UANG MUKA DP HANGUS</p>
        <p>- PELUNASAN PALING LAMBAT H-5 DARI TANGGAL KEBERANGKATAN</p>
        <p>- PEMBATALAN KURANG DARI 7 HARI DARI TANGGAL KEBERANGKATAN (H-7) DIKENAKAN KLAIM SEBESAR 50% DARI
            HARGA SEWA</p>
        <p>- PEMBATAL KURANG DARI 3 HARI DARI TANGGAL KEBERANGKATAN SELURUH UANG MUKA/DP ATAUPUN DANA PELUNASAN
            HANGUS TIDAK DAPAT DIKEMBALIKAN</p>
        <p>- HARGA SEWAKTU WAKTU DAPAT BERUBAH TANPA PEMBERITAHUAN TERLEBIH DAHULU (KENAIKAN HARGA BBM)</p>
        <p>- PENYEWA BERTANGGUNG JAWAB SEPENUHNYA APABILA MERUSAK FASILITAS KENDARAAN / BUS</p>
        <h5>TAMBAHAN WAKTU / JAM</h5>
        <p>1. BIGBUS : RP. 350.000,-/JAM</p>
        <p>2. LEGREST BIGBUS : RP. 500.000,-/JAM</p>
        <p>3. MEDIUM : 200.000,-/JAM</p>
        <p>4. HIACE : RP. 150.000/JAM </p>
        <h5>TAMBAHAN WAKTU / HARI</h5>
        <p>1. BIGBUS : RP. 3.500.000,-/JAM</p>
        <p>2. LEGREST BIGBUS : RP. 4.500.000,-/JAM</p>
        <p>3. MEDIUM : 2.500.000,-/JAM</p>
        <p>4. HIACE : RP. 1.800.000/JAM </p>
        <h5>PENAMBAHAN ONGKOS JEMPUT & TUJUAN TAMBAHAN TIDAK SEARAH</h5>
        <p>1. BIGBUS : NEGOISASI</p>
        <p>2. MEDIUM : NEGOISASI</p>
        <p>3. HIACE : NEGOISASI</p>
    </div>

</body>

</html>
