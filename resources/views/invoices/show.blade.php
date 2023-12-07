<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Invoice</title>
    <!-- Tambahkan link ke file CSS Bootstrap di sini -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Detail Invoice</h1>
        <a href="{{ route('invoice.index') }}" class="btn btn-primary">Kembali ke Daftar Invoice</a>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">No. Booking: {{ $invoice->no_booking }}</h5>
                <p class="card-text">Tanggal Pesan: {{ $invoice->tgl_pesan }}</p>
                <p class="card-text">Tanggal Pemakaian: {{ $invoice->tgl_pemakaian }}</p>
                <p class="card-text">Nama Penyewa: {{ $invoice->nama_penyewa }}</p>
                <p class="card-text">Tujuan Wisata: {{ $invoice->tujuan_wisata }}</p>
                <p class="card-text">Jumlah Unit: {{ $invoice->jumlah_unit }}</p>
                <p class="card-text">Rute: {{ $invoice->rute }}</p>
                <p class="card-text">Alamat Jemput: {{ $invoice->alamat_jemput }}</p>
                <p class="card-text">Contact Person: {{ $invoice->contact_person }}</p>
                <p class="card-text">Harga: {{ format_rupiah($invoice->harga) }}</p>
                <p class="card-text">Pembayaran: {{ format_rupiah($invoice->pembayaran) }}</p>
                <p class="card-text">Sisa: {{ format_rupiah($invoice->sisa) }}</p>

                <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-warning">Edit</a>

                <a href="{{ route('invoice.pdf', $invoice->id) }}" class="btn btn-success">Download PDF</a>

                <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus invoice ini?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
