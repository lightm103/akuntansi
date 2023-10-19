<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Bus Pariwisata</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    <h3>Detail Bus Pariwisata</h3>
    <hr>

    <div class="row">
        <div class="col-md-4 font-weight-bold">Nama Pemesan:</div>
        <div class="col-md-8">{{ $bus->pemesanBus->nama_pemesan }}</div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Tanggal Berangkat:</div>
        <div class="col-md-8">{{ $bus->pemesanBus->tanggal_berangkat }}</div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Tanggal Pulang:</div>
        <div class="col-md-8">{{ $bus->pemesanBus->tanggal_pulang }}</div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Biaya Sewa:</div>
        <div class="col-md-8">{{ format_rupiah($bus->pemesanBus->biaya_sewa) }}</div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Uang Masuk:</div>
        <div class="col-md-8">{{ format_rupiah($bus->uang_masuk) }}</div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Uang Belum Dibayar:</div>
        <div class="col-md-8">{{ format_rupiah($bus->biaya_sewa - $bus->uang_masuk) }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Driver 1:</div>
        <div class="col-md-8">{{ $bus->driver1 }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Driver 2:</div>
        <div class="col-md-8">{{ $bus->driver2 }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Co Driver:</div>
        <div class="col-md-8">{{ $bus->co_driver }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Nomor Polisi Bus:</div>
        <div class="col-md-8">{{ $bus->no_polisi }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Tujuan :</div>
        <div class="col-md-8">{{ $bus->pemesanBus->tujuan }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Nomor Telp:</div>
        <div class="col-md-8">{{ $bus->pemesanBus->no_telp }}</div>
    </div>
    <div class="mt-4">
        <a href="{{ route('penggunaanbus.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal">Edit</button>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createDocumentModal">Buat Dokumen SPJ</button>
        <a href="{{ route('spj.show', $bus->id) }}" class="btn btn-info">Lihat Dokumen SPJ</a>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Bus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('penggunaanbus.update', $bus->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_pemesan">Nama Pemesan:</label>
                            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="{{ $bus->nama_pemesan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_berangkat">Tanggal Berangkat:</label>
                            <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" value="{{ $bus->tanggal_berangkat }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pulang">Tanggal Pulang:</label>
                            <input type="date" class="form-control" id="tanggal_pulang" name="tanggal_pulang" value="{{ $bus->tanggal_pulang }}">
                        </div>
                        <div class="form-group">
                            <label for="biaya_sewa">Biaya Sewa:</label>
                            <input type="number" class="form-control" id="biaya_sewa" name="biaya_sewa" value="{{ $bus->biaya_sewa }}">
                        </div>
                        <div class="form-group">
                            <label for="uang_masuk">Uang Masuk:</label>
                            <input type="number" class="form-control" id="uang_masuk" name="uang_masuk" value="{{ $bus->uang_masuk }}">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createDocumentModal" tabindex="-1" aria-labelledby="createDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Buat Dokumen SPJ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('spj.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="bus_id" value="{{ $bus->id }}">
                        <div class="form-group">
                            <label for="alamat_jemput">Alamat Jemput :</label>
                            <input type="text" class="form-control" id="alamat_jemput" name="alamat_jemput" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="stand_by">Standby :</label>
                            <input type="text" class="form-control" id="stand_by" name="stand_by" value="" required>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="driver1_kas">Kas Driver 1 :</label>
                            <input type="number"
                                   class="form-control" name="driver1_kas" id="driver1_kas" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="driver2_kas">Kas Driver 2 :</label>
                            <input type="number"
                                   class="form-control" name="driver2_kas" id="driver2_kas" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="co_driver_kas">Kas Co Driver :</label>
                            <input type="number"
                                   class="form-control" name="co_driver_kas" id="co_driver_kas" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="solar_kas">Solar</label>
                            <input type="number"
                                   class="form-control" name="solar_kas" id="solar_kas" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="lain_lain_kas">Lain Lain</label>
                            <input type="number"
                                   class="form-control" name="lain_lain_kas" id="lain_lain_kas" placeholder="">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
