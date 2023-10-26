<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hutang Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="alerts"></div>
    <div class="container mt-5">

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="mb-3"> <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#tambahHutangModal"><i class="bi bi-plus"></i> Tambah Hutang Barang</button>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title">Pencarian Hutang Barang</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="GET" class="d-flex">
                            <input type="text" name="nama_barang" placeholder="Nama Barang"
                                class="form-control me-2">
                            <input type="text" name="nama_toko" placeholder="Nama Toko" class="form-control me-2">
                            <button type="submit" class="btn btn-primary me-2"><i class="bi bi-search"></i></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Hutang Barang</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Total Uang</th>
                                    <th>Nama Toko</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hutangBarangs as $hutang)
                                    <tr>
                                        <td>{{ $hutang->nama_barang }}</td>
                                        <td>{{ format_rupiah($hutang->total_uang) }}</td>
                                        <td>{{ $hutang->nama_toko }}</td>
                                        <td>{{ $hutang->status }}</td>
                                        <td>
                                            <select class="form-select update-status" data-id="{{ $hutang->id }}">
                                                <option value="lunas"
                                                    @if ($hutang->status == 'lunas') selected @endif>Lunas</option>
                                                <option value="belum_lunas"
                                                    @if ($hutang->status == 'belum_lunas') selected @endif>Belum Lunas
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Hutang Barang -->
    <div class="modal fade" id="tambahHutangModal" tabindex="-1" aria-labelledby="tambahHutangModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title" id="tambahHutangModalLabel">Tambah Hutang Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_uang" class="form-label">Total Uang</label>
                            <input type="number" name="total_uang" id="total_uang" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_toko" class="form-label">Nama Toko</label>
                            <input type="text" name="nama_toko" id="nama_toko" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="lunas">Lunas</option>
                                <option value="belum_lunas">Belum Lunas</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.update-status').change(function() {
                let status = $(this).val();
                let id = $(this).data('id');
                $.ajax({
                    url: `/hutang/${id}`,
                    type: 'POST', // Menggunakan method POST, sesuaikan dengan route di Laravel
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-HTTP-Method-Override': 'PATCH' // Menggunakan method override karena beberapa browser tidak mendukung PATCH
                    },
                    data: {
                        status: status
                    },
                    success: function(response) {
                        let alertClass = response.success ? "alert-success" : "alert-danger";
                        let alertHtml =
                            `<div class="alert ${alertClass} mt-3" role="alert">${response.message}</div>`;
                        $('#alerts').append(alertHtml);

                        setTimeout(() => {
                            $('#alerts .alert').first().remove();
                        }, 3000);
                    },
                    error: function(error) {
                        console.error("Error:", error);
                        let alertHtml =
                            `<div class="alert alert-danger mt-3" role="alert">Terjadi kesalahan saat mengupdate data.</div>`;
                        $('#alerts').append(alertHtml);
                        setTimeout(() => {
                            $('#alerts .alert').first().remove();
                        }, 3000);
                    }
                });
            });
        });
    </script>
</body>

</html>
