@extends('layouts.app')

@section('content')
    <h1>Daftar Menu</h1>

    <a href="{{ route('menus.create') }}" style="margin-bottom: 10px; display: inline-block;">Tambah Menu</a>

    <!-- Form Pencarian -->
    <form action="{{ route('menus.index') }}" method="GET" id="searchForm" style="margin-bottom: 10px;">
        <input type="text" name="search" id="searchInput" placeholder="Cari menu..." value="{{ request('search') }}" style="padding: 5px; width: 200px;">
    </form>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
        <thead>
            <tr>
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