<!-- resources/views/menus/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Menu</h1>

    <a href="{{ route('menus.create') }}" style="margin-bottom: 10px; display: inline-block;">Tambah Menu</a>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
        <thead>
            <tr>
                <!-- <th>ID Menu</th> -->
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                <tr>
                    <!-- <td>{{ $menu->id_menu }}</td> -->
                    <td>{{ $menu->nama_menu }}</td>
                    <td>{{ number_format($menu->harga_menu, 0, ',', '.') }}</td>
                    <td>{{ $menu->kategori_menu }}</td>
                    <td>
                        @if($menu->gambar_menu)
                            <img src="{{ asset('storage/' . $menu->gambar_menu) }}" alt="Gambar Menu" width="50">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('menus.edit', $menu->id_menu) }}" style="margin-right: 5px;">Edit</a>
                        <form action="{{ route('menus.destroy', $menu->id_menu) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection