<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Invoice</title>
    <!-- Tambahkan link ke file CSS Bootstrap di sini -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Edit Invoice</h1>
        <form method="POST" action="{{ route('invoice.update', $invoice->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="no_booking">No. Booking</label>
                <input type="text" class="form-control @error('no_booking') is-invalid @enderror" id="no_booking"
                    name="no_booking" value="{{ old('no_booking', $invoice->no_booking) }}" required>
                @error('no_booking')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tgl_pesan">Tgl Pesan</label>
                <input type="date" class="form-control @error('tgl_pesan') is-invalid @enderror" id="tgl_pesan"
                    name="tgl_pesan" value="{{ old('tgl_pesan', $invoice->tgl_pesan) }}" required>
                @error('tgl_pesan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tgl_pemakaian">Tgl Pemakaian</label>
                <input type="date" class="form-control @error('tgl_pemakaian') is-invalid @enderror"
                    id="tgl_pemakaian" name="tgl_pemakaian" value="{{ old('tgl_pemakaian', $invoice->tgl_pemakaian) }}"
                    required>
                @error('tgl_pemakaian')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_penyewa">Nama Penyewa</label>
                <input type="text" class="form-control @error('nama_penyewa') is-invalid @enderror" id="nama_penyewa"
                    name="nama_penyewa" value="{{ old('nama_penyewa', $invoice->nama_penyewa) }}" required>
                @error('nama_penyewa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tujuan_wisata">Tujuan Wisata</label>
                <input type="text" class="form-control @error('tujuan_wisata') is-invalid @enderror"
                    id="tujuan_wisata" name="tujuan_wisata" value="{{ old('tujuan_wisata', $invoice->tujuan_wisata) }}"
                    required>
                @error('tujuan_wisata')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jumlah_unit">Jumlah Unit</label>
                <input type="number" class="form-control @error('jumlah_unit') is-invalid @enderror" id="jumlah_unit"
                    name="jumlah_unit" value="{{ old('jumlah_unit', $invoice->jumlah_unit) }}" required>
                @error('jumlah_unit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="rute">Rute</label>
                <input type="text" class="form-control @error('rute') is-invalid @enderror" id="rute"
                    name="rute" value="{{ old('rute', $invoice->rute) }}" required>
                @error('rute')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat_jemput">Alamat Jemput</label>
                <input type="text" class="form-control @error('alamat_jemput') is-invalid @enderror"
                    id="alamat_jemput" name="alamat_jemput" value="{{ old('alamat_jemput', $invoice->alamat_jemput) }}"
                    required>
                @error('alamat_jemput')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="contact_person">Contact Person</label>
                <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                    id="contact_person" name="contact_person"
                    value="{{ old('contact_person', $invoice->contact_person) }}" required>
                @error('contact_person')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                    name="harga" value="{{ old('harga', $invoice->harga) }}" required>
                @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pembayaran">Pembayaran</label>
                <input type="number" class="form-control @error('pembayaran') is-invalid @enderror" id="pembayaran"
                    name="pembayaran" value="{{ old('pembayaran', $invoice->pembayaran) }}" required>
                @error('pembayaran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="sisa">Sisa</label>
                <input type="number" class="form-control @error('sisa') is-invalid @enderror" id="sisa"
                    name="sisa" value="{{ old('sisa', $invoice->sisa) }}" required>
                @error('sisa')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
