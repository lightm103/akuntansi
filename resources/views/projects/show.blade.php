<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Viewport untuk responsivitas -->
    <title>Detail Proyek</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Menggunakan sistem grid Bootstrap untuk responsivitas -->
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        Detail Proyek
                    </div>
                    <div class="card-body">
                        <h1 class="card-title">{{ $project->name }}</h1>
                        <p class="card-text">Uang Muka: <span class="badge badge-primary">{{ format_rupiah($project->uang_muka) }}</span></p>
                        <p class="card-text">Uang Pinjaman: <span class="badge badge-warning">{{ format_rupiah($project->uang_pinjaman) }}</span></p>
                    </div>
                </div>
                <!-- Anda dapat menambahkan form untuk mengedit detail proyek di sini -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
