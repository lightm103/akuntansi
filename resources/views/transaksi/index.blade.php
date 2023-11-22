<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>

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
        <div>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#pengeluaranModal">Tambah
                Pengeluaran
            </button>
            <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#pemasukanModal">Tambah
                Pemasukan
            </button>
        </div>

        <div>
            <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#eksportModal">Eksport Data
            </button>
            <a name="lihat-kas" id="lihat-kas" class="btn btn-primary ml-3" href="{{ route('kas.index') }}" role="button">Lihat Kas</a>
        </div>
    </div>
    <div class="d-flex my-4">
        <div>
            <table>
                <tr>
                    <td style="width: 200px;"><h5>Total Pemasukan</h5></td>
                    <td style="width: 20px;"><h5>:</h5></td>
                    <td><h5>{{ format_rupiah($totalTransactions['pemasukan']) }}</h5></td>
                </tr>
                <tr>
                    <td style="width: 200px;"><h5>Total Pengeluaran</h5></td>
                    <td style="width: 20px;"><h5>:</h5></td>
                    <td><h5> {{ format_rupiah($totalTransactions['pengeluaran']) }} </h5></td>
                </tr>
            </table>
        </div>
    </div>

    <table class="table table-bordered table-striped" id="table">
        <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jenis Transaksi</th>
            <th>Keterangan</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->tanggal_transaksi }}</td>
                <td>{{ $transaction->jenisTransaksi->nama_jenis_transaksi }}</td>
                <td>{{ $transaction->deskripsi_transaksi }}</td>
                <td>Rp{{ number_format($transaction->jenisTransaksi->kode_jenis_transaksi == 'debit' ? $transaction->jumlah : 0 , 2, ',', '.') }}</td>
                <td>Rp{{ number_format($transaction->jenisTransaksi->kode_jenis_transaksi == 'kredit' ? $transaction->jumlah : 0 , 2, ',', '.') }}</td>
                <td>
                    {{--                    <a href="{{ route('pengeluaran.show', $transaction->id) }}"--}}
                    {{--                       class="btn btn-sm btn-info">Detail</a>--}}
                    {{--                    <a href="#" class="btn btn-sm btn-warning btn-edit"--}}
                    {{--                       data-id="{{ $transaction->id }}"--}}
                    {{--                       data-project-id="{{ $transaction->project->id }}"--}}
                    {{--                       data-jumlah="{{ $transaction->jumlah }}"--}}
                    {{--                       data-keterangan="{{ $transaction->keterangan }}">--}}
                    {{--                        Edit--}}
                    {{--                    </a>--}}
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete_{{$transaction->id}}">
                        Delete
                    </button>

                    {{-- Modal Delete --}}
                    <div class="modal fade" id="modalDelete_{{$transaction->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ route('transaksi.destroy', $transaction->id) }}" method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="pengeluaranModalLabel">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal
                                        </button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="4" style="text-align:right">Total:</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>


<!-- Modal Tambah & Edit Pengeluaran -->
<div class="modal fade" id="pengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="pengeluaranModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('transaksi.kredit') }}" method="POST" id="pengeluaranForm">
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
                        <label for="tanggal_transaksi">Tanggal</label>
                        <input type="date"
                               class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" aria-describedby="helpId" placeholder=""
                               required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pengeluaran</label>
                        <select name="jenis_transaksi" id="jenis-pengeluaran" class="form-control" required>
                            <option value="" selected disabled>Pilih Jenis Pengeluaran</option>
                            <option value="proyek">Pengeluaran Proyek</option>
                            <option value="bus">Pengeluaran Travel</option>
                            <option value="lainnya">Pengeluaran Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group d-none" id="project-input">
                        <label for="transaksi_project_id">Proyek</label>
                        <select class="form-control" name="transaksi_project_id" id="transaksi_project_id">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-none" id="travel-input">
                        <label for="transaksi_travel_id">Pemesan Bus</label>
                        <select class="form-control" name="transaksi_travel_id" id="transaksi_travel_id">
                            @foreach ($travels as $travel)
                                <option value="{{ $travel->id }}">{{ $travel->nama_pemesan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-none" id="etc-input">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="deskripsi_transaksi" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" class="number form-control" name="jumlah" required>
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

{{-- Modal Pemasukan --}}
<div class="modal fade" id="pemasukanModal" tabindex="-1" role="dialog" aria-labelledby="pemasukanModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('transaksi.debit') }}" method="POST" id="pengeluaranForm">
                @csrf
                <input type="hidden" name="_method" id="method" value="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="pemasukanModalLabel">Tambah Pemasukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal_transaksi">Tanggal</label>
                        <input type="date"
                               class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" aria-describedby="helpId" placeholder=""
                               required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pemasukan</label>
                        <select name="jenis_transaksi" id="jenis-pemasukan" class="form-control" required>
                            <option value="" selected disabled>Pilih Jenis Pemasukan</option>
                            <option value="proyek">Pemasukan Proyek</option>
                            <option value="bus">Pemasukan Travel</option>
                            <option value="lainnya">Pemasukan Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group d-none" id="project-pemasukan">
                        <label for="transaksi_project_id">Proyek</label>
                        <select class="form-control" name="transaksi_project_id" id="transaksi_project_id">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-none" id="travel-pemasukan">
                        <label for="transaksi_travel_id">Pemesan Bus</label>
                        <select class="form-control" name="transaksi_travel_id" id="transaksi_travel_id">
                            @foreach ($travels as $travel)
                                <option value="{{ $travel->id }}">{{ $travel->nama_pemesan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-none" id="etc-pemasukan">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="deskripsi_transaksi" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" class="number form-control" name="jumlah" required>
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

{{-- Eksport Modal --}}
<div class="modal fade" id="eksportModal" tabindex="-1" role="dialog" aria-labelledby="eksportModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('transaksi.eksport') }}" method="POST" id="pengeluaranForm">
                @csrf
                <input type="hidden" name="_method" id="method" value="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="eksportModalLabel">Ekport Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="month">Pilih Bulan</label>
                        <select class="form-control" name="month" id="month">
                            @foreach($month as $key => $item)
                                <option
                                    value="{{ $key }}"> {{ \Illuminate\Support\Carbon::parse($item[0]->tanggal)->format('M') }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year">Pilh Tahun</label>
                        <select class="form-control" name="year" id="year">
                            @foreach($years as $key => $item)
                                <option value="{{ $key  }}"> {{ $key }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Eksport</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // merubah format number
        $('input.number').keyup(function(event) {
            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;
            // format number
            $(this).val(function(index, value) {
                return value
                    .replace(/\D/g, "")
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                    ;
            });
        });


        let table = $('#table');
        // table.DataTable();
        new DataTable('#table', {
            footerCallback: function (row, data, start, end, display) {
                let api = this.api();
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    if (typeof i === 'string') {
                        i = i.replace(/\D/g, '');
                        i = parseInt(i, 10);
                        i = Math.floor(i / 100);
                        var isValid = true;
                        for (var j = 0; j < i.length; j++) {
                            if (!isNaN(i[j])) {
                                continue;
                            } else {
                                isValid = false;
                                break;
                            }
                        }
                        if (isValid) {
                            return parseInt(i);
                        } else {
                            return 0;
                        }
                    } else {
                        return typeof i === 'number'? i : 0;
                    }
                };

                var column5 = api.column( 4, {page:'current'} ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var column6 = api.column( 5, {page:'current'} ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                $( api.column( 4 ).footer() ).html(column5.toLocaleString('id-ID', {style: 'currency', currency: 'IDR'}));
                $( api.column( 5 ).footer() ).html(column6.toLocaleString('id-ID', {style: 'currency', currency: 'IDR'}));
            }
        });

        $('#jenis-pengeluaran').on('change', function () {
            let jenisPengeluaran = $(this).val();
            let projectInput = $('#project-input');
            let travelInput = $('#travel-input');
            let etcInput = $('#etc-input');

            if (jenisPengeluaran === 'proyek') {
                projectInput.removeClass('d-none');
                projectInput.find('select').prop('disabled', false);
                travelInput.addClass('d-none');
                travelInput.find('select').prop('disabled', true);
                etcInput.removeClass('d-none');
                etcInput.find('textarea').prop('disabled', false);
            } else if (jenisPengeluaran === 'bus') {
                projectInput.addClass('d-none');
                projectInput.find('select').prop('disabled', true);
                travelInput.removeClass('d-none');
                travelInput.find('select').prop('disabled', false);
                etcInput.removeClass('d-none');
                etcInput.find('textarea').prop('disabled', false);
            } else {
                projectInput.addClass('d-none');
                projectInput.find('select').prop('disabled', true);
                travelInput.addClass('d-none');
                travelInput.find('select').prop('disabled', true);
                etcInput.removeClass('d-none');
                etcInput.find('textarea').prop('disabled', false);
            }
        });

        $('#jenis-pemasukan').on('change', function () {
            let jenisPemasukan = $(this).val();
            let projectInput = $('#project-pemasukan');
            let travelInput = $('#travel-pemasukan');
            let etcInput = $('#etc-pemasukan');

            if (jenisPemasukan === 'proyek') {
                projectInput.removeClass('d-none');
                projectInput.find('select').prop('disabled', false);
                travelInput.addClass('d-none');
                travelInput.find('select').prop('disabled', true);
                etcInput.removeClass('d-none');
            } else if (jenisPemasukan === 'bus') {
                projectInput.addClass('d-none');
                projectInput.find('select').prop('disabled', true);
                travelInput.removeClass('d-none');
                travelInput.find('select').prop('disabled', false);
                etcInput.removeClass('d-none');
            } else {
                projectInput.addClass('d-none');
                projectInput.find('select').prop('disabled', true);
                travelInput.addClass('d-none');
                travelInput.find('select').prop('disabled', true);
                etcInput.removeClass('d-none');
            }
        });


        // Open modal in ADD mode
        $('#addPengeluaranBtn').click(function () {
            $('#pengeluaranForm').attr('action', '{{ route('pengeluaran.store') }}');
            $('#method').val('POST');
            $('#pengeluaranModalLabel').text('Tambah Pengeluaran');
            $('#pengeluaranModal').modal('show');
        });

        // Open modal in EDIT mode
        $('.btn-edit').click(function () {
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
