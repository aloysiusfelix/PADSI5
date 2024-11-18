@extends('layouts.app')

@section('content')
    <h1>Daftar Stok</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <a href="{{ route('stoks.create') }}" style="margin-bottom: 10px; display: inline-block;">Tambah Stok</a>

    <!-- Form Pencarian -->
    <form action="{{ route('stoks.index') }}" method="GET" id="searchForm" style="margin-bottom: 10px;">
        <input type="text" name="search" id="searchInput" placeholder="Cari stok..." value="{{ request('search') }}" style="padding: 5px; width: 200px;">
    </form>

    <!-- Stok Cards -->
    <div class="stok-cards-container">
        @foreach ($stoks as $stok)
            <div class="stok-card">
                <div class="stok-card-header">
                    <h3>{{ $stok->nama_stok }}</h3>
                    <p>{{ number_format($stok->harga_stok, 0, ',', '.') }}</p>
                </div>
                <div class="stok-card-body">
                    <p><strong>Jumlah:</strong> {{ $stok->jumlah_stok }}</p>
                    <p><strong>Kategori:</strong> {{ $stok->kategori_stok }}</p>
                    <div class="stok-card-image">
                        @if($stok->gambar_stok)
                            <img src="{{ asset('storage/' . $stok->gambar_stok) }}" alt="Gambar Stok" width="150">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                    </div>
                </div>
                <div class="stok-card-footer">
                    <a href="{{ route('stoks.edit', $stok->id_stok) }}" class="stok-card-action">Edit</a>
                    <form action="{{ route('stoks.destroy', $stok->id_stok) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus stok ini?')" class="stok-card-action">Hapus</button>
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