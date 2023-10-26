<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Pariwisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<div class="container mt-5">
    <h3 class="mb-4">Bus Pariwisata</h3>
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
            <th>Nopol BUS</th>
            <th>Tanggal Berangkat</th>
            <th>Tanggal Pulang</th>
            <th>Tujuan</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($dataBuses as $bus)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bus->pemesanBus->nama_pemesan }}</td>
                <td>{{ $bus->no_polisi }}</td>
                <td>{{ $bus->pemesanBus->tanggal_berangkat }}</td>
                <td>{{ $bus->pemesanBus->tanggal_pulang }}</td>
                <td>{{ $bus->pemesanBus->tujuan }}</td>
                <td>
                    <a href="{{ route('penggunaanbus.show', $bus->id) }}" class="btn btn-sm btn-info">More</a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $bus->id }}"
                       class="btn btn-sm btn-danger">Delete</a>
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
                    <h5 class="modal-title" id="createModalLabel">Tambah Data Penggunaan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('penggunaanbus.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="pemesanbus_id">Nama Pemesan</label>
                            <select class="form-select" name="pemesanbus_id" id="pemesanbus_id">
                                <option value="" disabled selected>Pilih Pemesan</option>
                                @foreach($pemesanBus as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_pemesan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_berangkat">Tanggal Berangkat:</label>
                            <input type="date" class="form-control" id="tanggal_berangkat"
                                   name="tanggal_berangkat" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pulang">Tanggal Pulang:</label>
                            <input type="date" class="form-control" id="tanggal_pulang" name="tanggal_pulang" readonly>
                        </div>
                        <div class="form-group">
                            <label for="biaya_sewa">Biaya Sewa:</label>
                            <input type="number" class="form-control" id="biaya_sewa" name="biaya_sewa" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan :</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" readonly>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">Nomor Telp :</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" readonly>
                        </div>
                        <div class="form-group">
                            <label for="driver1">Driver 1 :</label>
                            <input type="text" class="form-control" id="driver1" name="driver1">
                        </div>
                        <div class="form-group">
                            <label for="driver2">Driver 2 :</label>
                            <input type="text" class="form-control" id="driver2" name="driver2">
                        </div>
                        <div class="form-group">
                            <label for="co_driver">Co Driver :</label>
                            <input type="text" class="form-control" id="co_driver" name="co_driver">
                        </div>
                        <div class="form-group">
                            <label for="no_polisi">Nomor Polisi Bus :</label>
                            <input type="text" class="form-control" id="no_polisi" name="no_polisi">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($dataBuses as $bus)
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
                        <form action="{{ route('penggunaanbus.destroy', $bus->id) }}" method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function () {
            let nama_pemesan = $('#pemesanbus_id');

            nama_pemesan.on('change', function () {
                let id = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '/get-pemesan/' + id,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $('#tanggal_berangkat').val(data.tanggal_berangkat);
                        $('#tanggal_pulang').val(data.tanggal_pulang);
                        $('#biaya_sewa').val(data.biaya_sewa);
                        $('#tujuan').val(data.tujuan);
                        $('#no_telp').val(data.no_telp);
                    }
                });
            });
        });
    </script>
</div>
</body>

</html>
