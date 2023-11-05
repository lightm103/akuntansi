<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Bus Pariwisata</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .flatpickr-input[readonly] {
            background-color: #ffffff;
        }
    </style>
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
        <div class="col-md-8">{{ format_rupiah($bus->pemesanBus->biaya_dp) }}</div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Uang Belum Dibayar:</div>
        <div class="col-md-8">{{ format_rupiah($bus->pemesanBus->biaya_sewa - $bus->pemesanBus->biaya_dp) }}</div>
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
        <div class="col-md-8">{{ $bus->armadaBus->nomor_plat }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Tujuan :</div>
        <div class="col-md-8">{{ $bus->pemesanBus->tujuan }}</div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 font-weight-bold">Nomor Telp:</div>
        <div class="col-md-8">{{ $bus->pemesanBus->no_telp }}</div>
    </div>
    <div class="mt-4 d-flex justify-content-between">
        <div>
            <a href="{{ route('penggunaanbus.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal">Edit</button>
        </div>
       <div>
           @if(is_null($bus->suratPerintahJalan))
               <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createDocumentModal">Buat
                   Dokumen SPJ
               </button>
           @else
               <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editDocumentModal">Edit
                   Dokumen SPJ
               </button>
               <a href="{{ route('spj.show', $bus->id) }}" class="btn btn-info">Lihat Dokumen SPJ</a>
           @endif
       </div>
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
                            <label for="pemesanbus_id">Nama Pemesan</label>
                            <input type="text"
                                   class="form-control" name="pemesanbus_id" id="pemesanbus_id"
                                   aria-describedby="helpId" placeholder="" value="{{ $bus->pemesanBus->nama_pemesan }}"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <label for="armada_id">Armada Bus</label>
                            <select class="form-control" name="armada_id" id="armada_id">
                                @foreach($armadaBus as $item)
                                    <option
                                        value="{{ $item->id }}" @selected($item->id == $bus->armadaBUs->id)>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="driver1">Driver 1 :</label>
                            <input type="text" class="form-control" id="driver1" name="driver1"
                                   value="{{ $bus->driver1 }}">
                        </div>
                        <div class="form-group">
                            <label for="driver2">Driver 2 :</label>
                            <input type="text" class="form-control" id="driver2" name="driver2"
                                   value="{{ $bus->driver2 }}">
                        </div>
                        <div class="form-group">
                            <label for="co_driver">Co Driver :</label>
                            <input type="text" class="form-control" id="co_driver" name="co_driver"
                                   value="{{ $bus->co_driver }}">
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

    <!-- Create SPJ Modal -->
    <div class="modal fade" id="createDocumentModal" tabindex="-1" aria-labelledby="createDocumentModalLabel"
         aria-hidden="true">
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
                            <label for="biaya_driver1">Kas Driver 1 :</label>
                            <input type="number"
                                   class="form-control" name="biaya_driver1" id="biaya_driver1" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="biaya_driver2">Kas Driver 2 :</label>
                            <input type="number"
                                   class="form-control" name="biaya_driver2" id="biaya_driver2" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="biaya_codriver">Kas Co Driver :</label>
                            <input type="number"
                                   class="form-control" name="biaya_codriver" id="biaya_codriver" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="biaya_solar">Solar</label>
                            <input type="number"
                                   class="form-control" name="biaya_solar" id="biaya_solar" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="biaya_lainnya">Lain Lain</label>
                            <input type="number"
                                   class="form-control" name="biaya_lainnya" id="biaya_lainnya" placeholder="">
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

    <!-- Edit SPJ Modal -->
    @if(!is_null($bus->suratPerintahJalan))
        <div class="modal fade" id="editDocumentModal" tabindex="-1" aria-labelledby="createDocumentModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Dokumen SPJ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('spj.update', $bus->suratPerintahJalan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="bus_id" value="{{ $bus->id }}">
                            <div class="form-group">
                                <label for="biaya_driver1">Kas Driver 1 :</label>
                                <input type="number"
                                       class="form-control" name="biaya_driver1" id="biaya_driver1" value="{{ $bus->suratPerintahJalan->biaya_driver1 }}" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="biaya_driver2">Kas Driver 2 :</label>
                                <input type="number"
                                       class="form-control" name="biaya_driver2" id="biaya_driver2" value="{{ $bus->suratPerintahJalan->biaya_driver2 }}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="biaya_codriver">Kas Co Driver :</label>
                                <input type="number"
                                       class="form-control" name="biaya_codriver" id="biaya_codriver" value="{{ $bus->suratPerintahJalan->biaya_codriver }}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="biaya_solar">Solar</label>
                                <input type="number"
                                       class="form-control" name="biaya_solar" id="biaya_solar" value="{{ $bus->suratPerintahJalan->biaya_solar }}" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="biaya_lainnya">Lain Lain</label>
                                <input type="number"
                                       class="form-control" name="biaya_lainnya" id="biaya_lainnya" placeholder="">
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
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    let standby = $("#standby");
    standby.flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });
</script>

</body>
</html>
