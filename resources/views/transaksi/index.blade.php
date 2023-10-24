<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengeluaran</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
    <div class="d-flex mb-4">
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#pengeluaranModal">Tambah
            Pengeluaran
        </button>
        <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#pemasukanModal">Tambah
            Pemasukan
        </button>
    </div>

    <table class="table table-bordered table-striped">
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
                <td>{{ $transaction->tanggal }}</td>
                <td>{{ $transaction->jenis_transaksi }}</td>
                <td>{{ $transaction->deskripsi }}</td>
                <td>Rp{{ number_format($transaction->debit, 2, ',', '.') }}</td>
                <td>Rp{{ number_format($transaction->kredit, 2, ',', '.') }}</td>
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
{{--                    <form action="{{ route('pengeluaran.destroy', $transaction->id) }}" method="POST"--}}
{{--                          style="display:inline;">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn btn-sm btn-danger"--}}
{{--                                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus--}}
{{--                        </button>--}}
{{--                    </form>--}}
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
                        <label for="tanggal">Tanggal</label>
                        <input type="date"
                               class="form-control" name="tanggal" id="tanggal" aria-describedby="helpId" placeholder="" required>
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
                        <label for="deskripsi">Proyek</label>
                        <select class="form-control" name="deskripsi" id="deskripsi">
                            @foreach ($projects as $project)
                                <option value="{{ $project->name }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-none" id="travel-input">
                        <label for="deskripsi">Pemesan Bus</label>
                        <select class="form-control" name="deskripsi" id="deskripsi">
                            @foreach ($travels as $travel)
                                <option value="{{ $travel->nama_pemesan }}">{{ $travel->nama_pemesan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-none" id="etc-input">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="kredit" required>
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
                        <label for="tanggal">Tanggal</label>
                        <input type="date"
                               class="form-control" name="tanggal" id="tanggal" aria-describedby="helpId" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pemasukan</label>
                        <select name="jenis_transaksi" id="jenis-pemasukan" class="form-control" required>
                            <option value="" selected disabled>Pilih Jenis Pengeluaran</option>
                            <option value="proyek">Pengeluaran Proyek</option>
                            <option value="bus">Pengeluaran Travel</option>
                            <option value="lainnya">Pengeluaran Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group d-none" id="project-pemasukan">
                        <label for="deskripsi">Proyek</label>
                        <select class="form-control" name="deskripsi" id="deskripsi">
                            @foreach ($projects as $project)
                                <option value="{{ $project->name }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-none" id="travel-pemasukan">
                        <label for="deskripsi">Pemesan Bus</label>
                        <select class="form-control" name="deskripsi" id="deskripsi">
                            @foreach ($travels as $travel)
                                <option value="{{ $travel->nama_pemesan }}">{{ $travel->nama_pemesan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-none" id="etc-pemasukan">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="debit" required>
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
    $(document).ready(function () {
        $('#jenis-pengeluaran').on('change', function (){
            let jenisPengeluaran = $(this).val();
            let projectInput = $('#project-input');
            let travelInput = $('#travel-input');
            let etcInput = $('#etc-input');

            if ( jenisPengeluaran === 'proyek'){
                projectInput.removeClass('d-none');
                projectInput.find('select').prop('disabled', false);
                travelInput.addClass('d-none');
                travelInput.find('select').prop('disabled', true);
                etcInput.addClass('d-none');
                etcInput.find('textarea').prop('disabled', true);
            }else if ( jenisPengeluaran === 'bus') {
                projectInput.addClass('d-none');
                projectInput.find('select').prop('disabled', true);
                travelInput.removeClass('d-none');
                travelInput.find('select').prop('disabled', false);
                etcInput.addClass('d-none');
                etcInput.find('textarea').prop('disabled', true);
            }else {
                projectInput.addClass('d-none');
                projectInput.find('select').prop('disabled', true);
                travelInput.addClass('d-none');
                travelInput.find('select').prop('disabled', true);
                etcInput.removeClass('d-none');
                etcInput.find('textarea').prop('disabled', false);
            }
        });

        $('#jenis-pemasukan').on('change', function (){
            let jenisPemasukan = $(this).val();
            let projectInput = $('#project-pemasukan');
            let travelInput = $('#travel-pemasukan');
            let etcInput = $('#etc-pemasukan');

            if ( jenisPemasukan === 'proyek'){
                projectInput.removeClass('d-none');
                projectInput.find('select').prop('disabled', false);
                travelInput.addClass('d-none');
                travelInput.find('select').prop('disabled', true);
                etcInput.addClass('d-none');
                etcInput.find('textarea').prop('disabled', true);
            }else if ( jenisPemasukan === 'bus') {
                projectInput.addClass('d-none');
                projectInput.find('select').prop('disabled', true);
                travelInput.removeClass('d-none');
                travelInput.find('select').prop('disabled', false);
                etcInput.addClass('d-none');
                etcInput.find('textarea').prop('disabled', true);
            }else {
                projectInput.addClass('d-none');
                projectInput.find('select').prop('disabled', true);
                travelInput.addClass('d-none');
                travelInput.find('select').prop('disabled', true);
                etcInput.removeClass('d-none');
                etcInput.find('textarea').prop('disabled', false);
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
