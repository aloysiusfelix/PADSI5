@extends('layouts.app')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <h1>Daftar Pelanggan</h1>

    <a href="{{ route('pelanggans.create') }}" style="margin-bottom: 10px; display: inline-block;">Tambah Pelanggan</a>

    <!-- Form Pencarian -->
    <form action="{{ route('pelanggans.index') }}" method="GET" id="searchForm" style="margin-bottom: 10px;">
        <input type="text" name="search" id="searchInput" placeholder="Cari pelanggan..." value="{{ request('search') }}" style="padding: 5px; width: 200px;">
    </form>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Poin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->nama_pelanggan }}</td>
                    <td>{{ $pelanggan->no_hp_pelanggan }}</td>
                    <td>{{ $pelanggan->email_pelanggan }}</td>
                    <td>{{ $pelanggan->poin_pelanggan ?? 0 }}</td>
                    <td>
                        <a href="{{ route('pelanggans.edit', $pelanggan->id_pelanggan) }}">Edit</a>
                        <form action="{{ route('pelanggans.destroy', $pelanggan->id_pelanggan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">Hapus</button>
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