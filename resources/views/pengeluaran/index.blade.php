<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengeluaran</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Daftar Pengeluaran</h2>
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pengeluaranModal">Tambah Pengeluaran</button>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Proyek</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengeluarans as $pengeluaran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengeluaran->project->name }}</td>
                        <td>Rp{{ number_format($pengeluaran->jumlah, 2, ',', '.') }}</td>
                        <td>{{ $pengeluaran->keterangan }}</td>
                        <td>
                            <a href="{{ route('pengeluaran.show', $pengeluaran->id) }}"
                                class="btn btn-sm btn-info">Detail</a>
                            <a href="#" class="btn btn-sm btn-warning btn-edit"
                                data-id="{{ $pengeluaran->id }}"
                                data-project-id="{{ $pengeluaran->project->id }}"
                                data-jumlah="{{ $pengeluaran->jumlah }}"
                                data-keterangan="{{ $pengeluaran->keterangan }}">
                                Edit
                            </a>
                            <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah & Edit Pengeluaran -->
    <div class="modal fade" id="pengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="pengeluaranModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('pengeluaran.store') }}" method="POST" id="pengeluaranForm">
                    @csrf
                    <input type="hidden" name="_method" id="method" value="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pengeluaranModalLabel">Tambah Pengeluaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Proyek</label>
                            <select name="project_id" class="form-control">
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Open modal in ADD mode
            $('#addPengeluaranBtn').click(function() {
                $('#pengeluaranForm').attr('action', '{{ route('pengeluaran.store') }}');
                $('#method').val('POST');
                $('#pengeluaranModalLabel').text('Tambah Pengeluaran');
                $('#pengeluaranModal').modal('show');
            });

            // Open modal in EDIT mode
            $('.btn-edit').click(function() {
                const id = $(this).data('id');
                const project_id = $(this).data('project-id');
                const jumlah = $(this).data('jumlah');
                const keterangan = $(this).data('keterangan');

                $('#pengeluaranForm').attr('action', `/pengeluaran/${id}`);
                $('#method').val('PUT');
                $('select[name="project_id"]').val(project_id);
                $('input[name="jumlah"]').val(jumlah);
                $('textarea[name="keterangan"]').val(keterangan);

                $('#pengeluaranModalLabel').text('Edit Pengeluaran');
                $('#pengeluaranModal').modal('show');
            });
        });
    </script>

</body>

</html>
