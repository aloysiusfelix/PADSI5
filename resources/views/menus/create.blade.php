<!-- resources/views/menus/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Menu Baru</h1>

    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nama_menu">Nama Menu</label>
            <input type="text" name="nama_menu" id="nama_menu" required>
        </div>
        <div>
            <label for="deskripsi_menu">Deskripsi Menu</label>
            <textarea name="deskripsi_menu" id="deskripsi_menu"></textarea>
        </div>
        <div>
            <label for="harga_menu">Harga Menu</label>
            <input type="number" name="harga_menu" id="harga_menu" required>
        </div>
        <div>
            <label for="kategori_menu">Kategori Menu</label>
            <input type="text" name="kategori_menu" id="kategori_menu" required>
        </div>
        <div>
            <label for="gambar_menu">Gambar Menu</label>
            <input type="file" name="gambar_menu" id="gambar_menu" accept="image/*">
        </div>
        <button type="submit">Simpan</button>
    </form>
@endsection