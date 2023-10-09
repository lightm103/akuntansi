<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-5">Dashboard</h2>
        <div class="row">
            <div class="col-md-6 col-sm-12 mb-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Uang Proyek</h5>
                        <p class="card-text display-4">Rp{{ number_format($totalUangProyek, 0, ',', '.') }}</p>
                        <a href="/projects" class="btn btn-primary btn-block">Lihat Proyek</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 mb-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Pengeluaran</h5>
                        <p class="card-text display-4">Rp{{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
                        <a href="/pengeluaran" class="btn btn-primary btn-block">Lihat Detail Pengeluaran</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Penggunaan Bus</h5>
                        <p class="card-text">Klik tombol di bawah ini untuk melihat data penggunaan bus.</p>
                        <a href="/penggunaanbus" class="btn btn-primary btn-block">Lihat Data Penggunaan Bus</a>
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
