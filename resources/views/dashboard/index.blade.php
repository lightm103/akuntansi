<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
       body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f5f7;
        font-size: 14px; /* Menurunkan ukuran font dasar */
    }

    .container {
        padding: 20px;
    }

    .card {
        border-radius: 20px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    h2.text-center {
        font-size: 20px; /* Menyesuaikan ukuran font untuk judul */
        margin-bottom: 3rem; /* Mengurangi margin bawah */
    }

    .card-title {
        font-size: 16px; /* Menyesuaikan ukuran font untuk judul kartu */
    }

    .display-4 {
        font-size: 12px; /* Menyesuaikan ukuran font untuk angka */
        font-weight: bold;
    }

    .btn-primary {
        background-color: #4CAF50;
        border-color: #4CAF50;
        border-radius: 15px;
        padding: 8px 12px; /* Mengurangi padding untuk tombol */
    }

    .btn-primary:hover,
    .btn-primary:focus {
        background-color: #45a049;
        border-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-5">Dashboard</h2>
        <div class="row">
            <div class="col-6 mb-3 ">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Proyek</h5>
                        <a href="/projects" class="btn btn-primary btn-block">Lihat Proyek</a>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Pemesanan Bus</h5>
                        <a href="{{ route('pemesanbus.index') }}" class="btn btn-primary btn-block">Lihat Data</a>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-3 ">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Pengeluaran & Pemasukan</h5>
                        <a href="https://akuntansi.samagahadigital.com/transaksi" class="btn btn-primary btn-block">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">INVOICE</h5>
                        <a href="{{ route('invoice.index')}}" class="btn btn-primary btn-block">Buat Invoice</a>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Hutang Barang</h5>
                        <a href="{{ route('hutang.index')}}" class="btn btn-primary btn-block">Lihat Data</a>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Hutang Uang</h5>
                        <a href="{{ route('hutanguang.index')}}" class="btn btn-primary btn-block">Lihat Data</a>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">.</h5>
                        <button class="btn btn-warning btn-block" disabled></button>
                    </div>
                </div>
            </div>            
        </div>        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
