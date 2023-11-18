<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kas</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>

</head>

<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Data Kas Perusahaan</h2>
    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali ke Transaksi</a>
        </div>
    </div>

    <table class="table table-bordered table-striped" id="table">
        <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Transaksi</th>
            <th>Nama Transaksi</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
            <th>Saldo</th>
        </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item['jenis_transaksi']}}</td>
                    <td>{{ $item['transaksi']}}</td>
                    <td>{{ $item['pemasukan']}}</td>
                    <td>{{ $item['pengeluaran']}}</td>
                    <td>{{ $item['pemasukan'] - $item['pengeluaran']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



<script>
    $(document).ready(function () {
        let table = $('#table');
        table.DataTable();
    });
</script>

</body>

</html>
