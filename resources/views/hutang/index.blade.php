<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hutang Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-md-12">
            <form action="#" method="GET" class="d-flex"> <!-- Pastikan Anda mengganti # dengan action URL yang benar. -->
                <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control me-2">
                <input type="text" name="nama_toko" placeholder="Nama Toko" class="form-control me-2">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Total Uang</th>
                        <th>Nama Toko</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh Data (Anda bisa menggantinya dengan data asli dari database Anda) -->
                    <tr>
                        <td>Barang A</td>
                        <td>100000</td>
                        <td>Toko A</td>
                        <td>Lunas</td>
                    </tr>
                    <tr>
                        <td>Barang B</td>
                        <td>150000</td>
                        <td>Toko B</td>
                        <td>Belum Lunas</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Opsional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
