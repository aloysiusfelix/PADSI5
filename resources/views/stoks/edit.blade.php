@extends('layouts.app')

@section('content')
    <h1>Edit Stok</h1>

    {{-- SweetAlert untuk menampilkan pesan error --}}
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '{!! implode("<br>", $errors->all()) !!}',
            });
        </script>
    @endif

    <form action="{{ route('stoks.update', $stok->id_stok) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama Stok -->
        <div class="mb-3">
            <label for="nama_stok" class="form-label">Nama Stok</label>
            <input type="text" name="nama_stok" id="nama_stok" class="form-control" value="{{ old('nama_stok', $stok->nama_stok) }}" required>
            @if ($errors->has('nama_stok'))
                <div class="error text-danger">{{ $errors->first('nama_stok') }}</div>
            @endif
        </div>

        <!-- Deskripsi Stok -->
        <div class="mb-3">
            <label for="deskripsi_stok" class="form-label">Deskripsi Stok</label>
            <textarea name="deskripsi_stok" id="deskripsi_stok" class="form-control">{{ old('deskripsi_stok', $stok->deskripsi_stok) }}</textarea>
        </div>

        <!-- Jumlah Stok -->
        <div class="mb-3">
            <label for="jumlah_stok" class="form-label">Jumlah Stok</label>
            <input type="number" name="jumlah_stok" id="jumlah_stok" class="form-control" value="{{ old('jumlah_stok', $stok->jumlah_stok) }}" required>
            @if ($errors->has('jumlah_stok'))
                <div class="error text-danger">{{ $errors->first('jumlah_stok') }}</div>
            @endif
        </div>

        <!-- Kategori Stok -->
        <div class="mb-3">
            <label for="kategori_stok" class="form-label">Kategori Stok</label>
            <input type="text" name="kategori_stok" id="kategori_stok" class="form-control" value="{{ old('kategori_stok', $stok->kategori_stok) }}" required>
            @if ($errors->has('kategori_stok'))
                <div class="error text-danger">{{ $errors->first('kategori_stok') }}</div>
            @endif
        </div>

        <!-- Harga Stok -->
        <div class="mb-3">
            <label for="harga_stok" class="form-label">Harga Stok</label>
            <input type="number" step="0.01" name="harga_stok" id="harga_stok" class="form-control" value="{{ old('harga_stok', $stok->harga_stok) }}" required>
            @if ($errors->has('harga_stok'))
                <div class="error text-danger">{{ $errors->first('harga_stok') }}</div>
            @endif
        </div>

        <!-- Gambar Stok -->
        <div class="mb-3">
            <label for="gambar_stok" class="form-label">Gambar Stok</label>
            <div style="display: flex; align-items: center;">
                @if($stok->gambar_stok)
                    <img src="{{ asset('storage/' . $stok->gambar_stok) }}" alt="Gambar Stok" width="100" style="margin-right: 10px;">
                @else
                    <p>Tidak ada gambar</p>
                @endif
                <input type="file" name="gambar_stok" id="gambar_stok" accept="image/*">
                @if ($errors->has('gambar_stok'))
                    <div class="error text-danger">{{ $errors->first('gambar_stok') }}</div>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection