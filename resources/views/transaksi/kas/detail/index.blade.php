<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Transaksi</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>

</head>

<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Detail Kas</h2>
    <div class="row mb-3">
        <div class="col-md-12">
            <a href="{{ route('kas.index') }}" class="btn btn-secondary">Kembali ke Kas</a>
        </div>
    </div>

    <table class="table table-bordered table-striped" id="table">
        <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jenis Transaksi</th>
            <th>Keterangan</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->tanggal_transaksi }}</td>
                <td>{{ $transaction->jenisTransaksi->nama_jenis_transaksi }}</td>
                <td>{{ $transaction->deskripsi_transaksi }}</td>
                <td>Rp{{ number_format($transaction->jenisTransaksi->kode_jenis_transaksi == 'debit' ? $transaction->jumlah : 0 , 2, ',', '.') }}</td>
                <td>Rp{{ number_format($transaction->jenisTransaksi->kode_jenis_transaksi == 'kredit' ? $transaction->jumlah : 0 , 2, ',', '.') }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="4" style="text-align:right">Total:</th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>
<script>
    $(document).ready(function () {
        let table = $('#table');
        // table.DataTable();
        new DataTable('#table', {
            footerCallback: function (row, data, start, end, display) {
                let api = this.api();
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    if (typeof i === 'string') {
                        i = i.replace(/\D/g, '');
                        i = parseInt(i, 10);
                        i = Math.floor(i / 100);
                        var isValid = true;
                        for (var j = 0; j < i.length; j++) {
                            if (!isNaN(i[j])) {
                                continue;
                            } else {
                                isValid = false;
                                break;
                            }
                        }
                        if (isValid) {
                            return parseInt(i);
                        } else {
                            return 0;
                        }
                    } else {
                        return typeof i === 'number'? i : 0;
                    }
                };

                var column5 = api.column( 4, {page:'current'} ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var column6 = api.column( 5, {page:'current'} ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                $( api.column( 4 ).footer() ).html(column5.toLocaleString('id-ID', {style: 'currency', currency: 'IDR'}));
                $( api.column( 5 ).footer() ).html(column6.toLocaleString('id-ID', {style: 'currency', currency: 'IDR'}));
            }
        });
    });
</script>

</body>

</html>
