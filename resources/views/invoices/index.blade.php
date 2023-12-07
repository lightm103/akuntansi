<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Invoice</title>
    <!-- Tambahkan link ke file CSS Bootstrap di sini -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambahkan CSS khusus untuk mengatur tampilan mobile */
        @media (max-width: 768px) {
            /* Misalnya, mengubah ukuran font pada tampilan mobile */
            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Invoice</h1>
        <a href="{{ route('invoice.create') }}" class="btn btn-primary mb-2">Buat Invoice Baru</a>
        @if (count($invoices) > 0)
            <div class="row">
                @foreach ($invoices as $invoice)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">No. Booking: {{ $invoice->no_booking }}</h5>
                                <p class="card-text">Tanggal Pesan: {{ $invoice->tgl_pesan }}</p>
                                <p class="card-text">Nama Penyewa: {{ $invoice->nama_penyewa }}</p>
                                <p class="card-text">Tujuan Wisata: {{ $invoice->tujuan_wisata }}</p>
                                <a href="{{ route('invoice.show', $invoice->id) }}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Tidak ada invoice.</p>
        @endif
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
