<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <h3>Daftar Proyek</h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProjectModal">
                        Tambah Proyek
                    </button>
                </div>

                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th>Uang Modal Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ format_rupiah($project->total) }}</td>
                                <td><a href="{{ route('projects.show', $project->id) }}"
                                        class="btn btn-info btn-sm">Show</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Proyek -->
    <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="addProjectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProjectModalLabel">Tambah Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('projects.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Proyek</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Uang Muka</label>
                            <input type="number" class="form-control" name="uang_muka" required>
                        </div>
                        <div class="form-group">
                            <label>Uang Pinjaman</label>
                            <input type="number" class="form-control" name="uang_pinjaman" required>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
