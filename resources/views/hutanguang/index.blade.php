<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hutang Uang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .btn-success {
            background-color: #34c759;
        }

        .card {
            border-radius: 15px;
        }

        .modal-content {
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
        }

        /* Custom styles for responsiveness */
        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .card-title {
                font-size: 1.25rem;
            }

            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.875rem;
            }
        }

        /* Improved hover states */
        .btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-light">
    <div id="alerts"></div>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-12">
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                    data-bs-target="#tambahHutangModal">
                    <i class="bi bi-plus"></i> Tambah Hutang Uang
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Hutang Uang</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Pemberi</th>
                                    <th>Jumlah Uang</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hutangUangs as $hutang)
                                    <tr>
                                        <td>{{ $hutang->nama_pemberi }}</td>
                                        <td>{{ format_rupiah($hutang->jumlah_uang) }}</td>
                                        <td>{{ $hutang->keterangan }}</td>
                                        <td>{{ $hutang->status }}</td>
                                        <td>
                                            <form action="{{ route('hutanguang.update', $hutang->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select class="form-select" name="status">
                                                    <option value="lunas"
                                                        @if ($hutang->status == 'lunas') selected @endif>Lunas</option>
                                                    <option value="belum_lunas"
                                                        @if ($hutang->status == 'belum_lunas') selected @endif>Belum Lunas
                                                    </option>
                                                </select>
                                                <button type="submit" class="btn btn-primary mt-2">Update
                                                    Status</button>
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

        <!-- Modal Tambah Hutang Uang -->
        <div class="modal fade" id="tambahHutangModal" tabindex="-1" aria-labelledby="tambahHutangModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahHutangModalLabel">Tambah Hutang Uang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('hutanguang.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_pemberi" class="form-label">Nama Pemberi</label>
                                <input type="text" name="nama_pemberi" id="nama_pemberi" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_uang" class="form-label">Total Uang</label>
                                <input type="number" name="jumlah_uang" id="jumlah_uang" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" required>
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

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
