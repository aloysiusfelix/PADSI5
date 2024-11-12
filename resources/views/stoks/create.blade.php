@extends('layouts.app')

@section('content')
    <h1>Tambah Stok Baru</h1>

    {{-- SweetAlert untuk menampilkan pesan pop-up error --}}
    @if ($errors->has('nama_stok'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ $errors->first('nama_stok') }}",
            });
        </script>
    @endif

    <form action="{{ route('stoks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="nama_stok">Nama Stok</label>
            <input type="text" name="nama_stok" id="nama_stok" required value="{{ old('nama_stok') }}">
            {{-- Hilangkan pesan error di bawah input --}}
        </div>
        
        <div>
            <label for="deskripsi_stok">Deskripsi Stok</label>
            <textarea name="deskripsi_stok" id="deskripsi_stok">{{ old('deskripsi_stok') }}</textarea>
        </div>
        
        <div>
            <label for="jumlah_stok">Jumlah Stok</label>
            <input type="number" name="jumlah_stok" id="jumlah_stok" required value="{{ old('jumlah_stok') }}">
            @if ($errors->has('jumlah_stok'))
                <div class="error">{{ $errors->first('jumlah_stok') }}</div>
            @endif
        </div>
        
        <div>
            <label for="kategori_stok">Kategori Stok</label>
            <input type="text" name="kategori_stok" id="kategori_stok" required value="{{ old('kategori_stok') }}">
            @if ($errors->has('kategori_stok'))
                <div class="error">{{ $errors->first('kategori_stok') }}</div>
            @endif
        </div>
        
        <div>
            <label for="harga_stok">Harga Stok</label>
            <input type="number" step="0.01" name="harga_stok" id="harga_stok" required value="{{ old('harga_stok') }}">
            @if ($errors->has('harga_stok'))
                <div class="error">{{ $errors->first('harga_stok') }}</div>
            @endif
        </div>
        
        <div>
            <label for="gambar_stok">Gambar Stok</label>
            <input type="file" name="gambar_stok" id="gambar_stok" accept="image/*">
            @if ($errors->has('gambar_stok'))
                <div class="error">{{ $errors->first('gambar_stok') }}</div>
            @endif
        </div>
        
        <button type="submit">Simpan</button>
    </form>
@endsection
