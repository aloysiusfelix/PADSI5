@extends('layouts.app')

@section('content')
    <h1>Daftar Menu</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <a href="{{ route('menus.create') }}" style="margin-bottom: 10px; display: inline-block;">Tambah Menu</a>

    <!-- Form Pencarian -->
    <form action="{{ route('menus.index') }}" method="GET" id="searchForm" style="margin-bottom: 10px;">
        <input type="text" name="search" id="searchInput" placeholder="Cari menu..." value="{{ request('search') }}" style="padding: 5px; width: 200px;">
    </form>

    <!-- Menu Cards -->
    <div class="menu-cards-container">
        @foreach ($menus as $menu)
            <div class="menu-card">
                <div class="menu-card-header">
                    <h3>{{ $menu->nama_menu }}</h3>
                    <p>{{ number_format($menu->harga_menu, 0, ',', '.') }}</p>
                </div>
                <div class="menu-card-body">
                    <p><strong>Kategori:</strong> {{ $menu->kategori_menu }}</p>
                    <div class="menu-card-image">
                        @if($menu->gambar_menu)
                            <img src="{{ asset('storage/' . $menu->gambar_menu) }}" alt="Gambar Menu" width="650">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                    </div>
                </div>
                <div class="menu-card-footer">
                    <a href="{{ route('menus.edit', $menu->id_menu) }}" class="menu-card-action">Edit</a>
                    <form action="{{ route('menus.destroy', $menu->id_menu) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')" class="menu-card-action">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

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