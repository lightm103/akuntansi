<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hutang Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @media (max-width: 576px) {

            /* Padding & Margin */
            .container {
                padding: 10px;
            }

            /* Ukuran Font */
            h5.card-title {
                font-size: 18px;
            }

            /* Tombol */
            button {
                width: 100%;
                margin-bottom: 10px;
            }

            /* Layout Tabel */
            .table-responsive {
                overflow-x: auto;
            }

            .table td,
            .table th {
                padding: .5rem;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <div id="alerts"></div>

    <div class="container mt-5">
        <!-- Tombol Trigger Modal -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahHutangModal">
            <i class="bi bi-plus"></i> Tambah Hutang Barang
        </button>

        <!-- Pencarian Hutang Barang -->
        <div class="card shadow mb-3">
            <div class="card-header">
                <h5 class="card-title">Pencarian Hutang Barang</h5>
            </div>
            <div class="card-body">
                <form action="#" method="GET" class="d-flex">
                    <input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control me-2">
                    <input type="text" name="nama_toko" placeholder="Nama Toko" class="form-control me-2">
                    <button type="submit" class="btn btn-primary me-2"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>

        <!-- Daftar Hutang Barang -->
        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title">Daftar Hutang Barang</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Nama Toko</th>
                            <th>Total Uang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hutangBarangs as $hutang)
                            <tr>
                                <td>{{ $hutang->nama_barang }}</td>
                                <td>{{ $hutang->nama_toko }}</td>
                                <td>{{ format_rupiah($hutang->total_uang) }}</td>
                                <td>{{ $hutang->status }}</td>
                                <td>
                                    <form action="{{ route('hutang.update', $hutang->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="status">
                                            <option value="lunas" @if ($hutang->status == 'lunas') selected @endif>
                                                Lunas</option>
                                            <option value="belum_lunas"
                                                @if ($hutang->status == 'belum_lunas') selected @endif>Belum Lunas</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal Tambah Hutang Barang -->
    <div class="modal fade" id="tambahHutangModal" tabindex="-1" aria-labelledby="tambahHutangModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahHutangModalLabel">Tambah Hutang Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('hutang.store') }}" method="POST">
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

</body>

</html>
