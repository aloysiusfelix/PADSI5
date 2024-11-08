<!-- resources/views/menus/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Menu</h1>

    <form action="{{ route('menus.update', $menu->id_menu) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div>
            <label for="nama_menu">Nama Menu</label>
            <input type="text" name="nama_menu" id="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}" required>
        </div>
        
        <div>
            <label for="deskripsi_menu">Deskripsi Menu</label>
            <textarea name="deskripsi_menu" id="deskripsi_menu">{{ old('deskripsi_menu', $menu->deskripsi_menu) }}</textarea>
        </div>
        
        <div>
            <label for="harga_menu">Harga Menu</label>
            <input type="number" name="harga_menu" id="harga_menu" value="{{ old('harga_menu', $menu->harga_menu) }}" required>
        </div>
        
        <div>
            <label for="kategori_menu">Kategori Menu</label>
            <input type="text" name="kategori_menu" id="kategori_menu" value="{{ old('kategori_menu', $menu->kategori_menu) }}" required>
        </div>
        
        <div>
            <label for="gambar_menu">Gambar Menu</label>
            <div style="display: flex; align-items: center;">
                @if($menu->gambar_menu)
                    <img src="{{ asset('storage/' . $menu->gambar_menu) }}" alt="Gambar Menu" width="100" style="margin-right: 10px;">
                @else
                    <p>Tidak ada gambar</p>
                @endif
                <input type="file" name="gambar_menu" id="gambar_menu" accept="image/*">
            </div>
        </div>
        
        <button type="submit">Update</button>
    </form>
@endsection
