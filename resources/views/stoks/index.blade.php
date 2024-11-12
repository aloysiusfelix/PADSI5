<!-- resources/views/stoks/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Stok</h1>

    <a href="{{ route('stoks.create') }}" style="margin-bottom: 10px; display: inline-block;">Tambah Stok</a>

        <!-- Form Pencarian -->
        <form action="{{ route('stoks.index') }}" method="GET" id="searchForm" style="margin-bottom: 10px;">
            <input type="text" name="search" id="searchInput" placeholder="Cari stok..." value="{{ request('search') }}" style="padding: 5px; width: 200px;">
        </form>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
        <thead>
            <tr>
                <th>Nama Stok</th>
                <th>Jumlah</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stoks as $stok)
                <tr>
                    <td>{{ $stok->nama_stok }}</td>
                    <td>{{ $stok->jumlah_stok }}</td>
                    <td>{{ $stok->kategori_stok }}</td>
                    <td>{{ number_format($stok->harga_stok, 0, ',', '.') }}</td>
                    <td>
                        @if($stok->gambar_stok)
                            <img src="{{ asset('storage/' . $stok->gambar_stok) }}" alt="Gambar Stok" width="50">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('stoks.edit', $stok->id_stok) }}">Edit</a>
                        <form action="{{ route('stoks.destroy', $stok->id_stok) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus stok ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function debounce(func, delay) {
            let timeoutId;
            return function(...args) {
                if (timeoutId) {
                    clearTimeout(timeoutId);
                }
                timeoutId = setTimeout(() => {
                    func.apply(this, args);
                }, delay);
            };
        }

        // JavaScript for real-time search with debounce
        const searchInput = document.getElementById('searchInput');
        const searchForm = document.getElementById('searchForm');

        searchInput.addEventListener('keyup', debounce(function() {
            searchForm.submit();
        }, 500));
    </script>
@endsection