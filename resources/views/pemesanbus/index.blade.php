<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesan Bus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .flatpickr-input[readonly] {
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h3 class="mb-4">Pemesan Bus</h3>
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            </div>
        </div>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah
            Data
        </button>

        <table class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pemesan</th>
                    <th>Tanggal Berangkat</th>
                    <th>Biaya Sewa</th>
                    <th>DP</th>
                    <th>No Telp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $pemesanBus)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pemesanBus->nama_pemesan }}</td>
                        <td>{{ $pemesanBus->tanggal_berangkat }}</td>
                        <td>{{ format_rupiah($pemesanBus->biaya_sewa) }}</td>
                        <td>{{ format_rupiah($pemesanBus->biaya_dp) }}</td>
                        <td>{{ $pemesanBus->no_telp }}</td>
                        <td>
                            <a href="{{ route('pemesanbus.show', $pemesanBus) }}" class="btn btn-sm btn-info">More</a>
                            <button type="button" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $pemesanBus->id }}" class="btn btn-sm btn-danger">Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Data Pemesan</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pemesanbus.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_pemesan">Nama Pemesan:</label>
                                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_berangkat">Tanggal Berangkat:</label>
                                <input type="date" class="form-control" id="tanggal_berangkat"
                                    name="tanggal_berangkat" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pulang">Tanggal Pulang:</label>
                                <input type="date" class="form-control" id="tanggal_pulang" name="tanggal_pulang">
                            </div>
                            <div class="form-group">
                                <label for="biaya_sewa">Biaya Sewa:</label>
                                <input type="text" class="number form-control" id="biaya_sewa" name="biaya_sewa"
                                    min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="biaya_dp">DP :</label>
                                <input type="text" class="number form-control" id="biaya_dp" name="biaya_dp" value="0"
                                    min="0">
                            </div>
                            <div class="form-group">
                                <label for="tujuan">Tujuan :</label>
                                <input type="text" class="form-control" id="tujuan" name="tujuan" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">Nomor Telp :</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat_jemput">Alamat Jemput :</label>
                                <input type="text" class="form-control" id="alamat_jemput" name="alamat_jemput">
                            </div>
                            <div class="form-group mb-3">
                                <label for="standby">Standby :</label>
                                <input type="text" class="form-control" id="standby" name="standby" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($data as $bus)
            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal{{ $bus->id }}" tabindex="-1"
                aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Anda yakin ingin menghapus data ini?
                            <form action="{{ route('pemesanbus.destroy', $bus->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal
                                    </button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>
            $(document).ready(function() {
                // merubah format number
                $('input.number').keyup(function(event) {
                    // skip for arrow keys
                    if (event.which >= 37 && event.which <= 40) return;
                    // format number
                    $(this).val(function(index, value) {
                        return value
                            .replace(/\D/g, "")
                            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    });
                });

                let standby = $("#standby");
                standby.flatpickr({
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true
                });
            });
        </script>
    </div>
</body>

</html>
