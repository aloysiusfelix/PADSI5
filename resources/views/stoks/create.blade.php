@extends('layouts.app')

@section('content')
    <h1>Tambah Stok Baru</h1>

    <form action="{{ route('stoks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="nama_stok">Nama Stok</label>
            <input type="text" name="nama_stok" id="nama_stok" required>
        </div>
        
        <div>
            <label for="deskripsi_stok">Deskripsi Stok</label>
            <textarea name="deskripsi_stok" id="deskripsi_stok"></textarea>
        </div>
        
        <div>
            <label for="jumlah_stok">Jumlah Stok</label>
            <input type="number" name="jumlah_stok" id="jumlah_stok" required>
        </div>
        
        <div>
            <label for="kategori_stok">Kategori Stok</label>
            <input type="text" name="kategori_stok" id="kategori_stok" required>
        </div>
        
        <div>
            <label for="harga_stok">Harga Stok</label>
            <input type="number" step="0.01" name="harga_stok" id="harga_stok" required>
        </div>
        
        <div>
            <label for="gambar_stok">Gambar Stok</label>
            <input type="file" name="gambar_stok" id="gambar_stok" accept="image/*">
        </div>
        
        <button type="submit">Simpan</button>
    </form>
@endsection
