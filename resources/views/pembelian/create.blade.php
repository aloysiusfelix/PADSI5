@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pembelian</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Pembelian -->
    <form action="{{ route('pembelian.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
            <input type="text" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
        </div>

        <!-- Menu Items (for Pembelian) -->
        <div class="mb-3">
            <label for="id_stok" class="form-label">Nama Stok</label>
            <div class="menu-items" id="menuItems">
                <div class="menu-item">
                    <select name="stok[]" class="form-control stok" required>
                        <option value="">Pilih Stok</option>
                        @foreach($stokItems as $stok)
                            <option value="{{ $stok->id_stok }}" data-jumlah="{{ $stok->jumlah_stok }}">
                                {{ $stok->nama_stok }} (Jumlah: {{ $stok->jumlah_stok }})
                            </option>
                        @endforeach
                    </select>
                    <input type="number" name="jumlah_item[]" class="form-control jumlah" placeholder="Jumlah" required min="1">
                </div>
            </div>
            <button type="button" class="btn btn-secondary" id="addMenuItem">Tambah Stok</button>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Pembelian</button>
    </form>

    <!-- Keranjang Pembelian -->
    <h2 class="mt-5">Keranjang Pembelian</h2>
    <table class="table">
    <thead>
        <tr>
            <th>Tanggal Pembelian</th>
            <th>ID Pembelian</th>
            <th>Stok Detail</th>
            <th>Total Harga Pembelian</th>
        </tr>
    </thead>
    <tbody>
        @foreach($formattedPembelian as $pembelian)
        <tr>
            <td>{{ $pembelian['tanggal_pembelian'] }}</td>
            <td>{{ $pembelian['id_pembelian'] }}</td>
            <td>{{ $pembelian['stok_detail'] }}</td>
            <td>{{ $pembelian['total_harga_pembelian'] }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>

    <div class="d-flex justify-content-between mt-3">
        <h4>Total Pembelian</h4>
        <h4>Rp {{ number_format($totalPembelian, 2) }}</h4>
    </div>

    <!-- Form Proses Pembelian -->
    <form action="{{ route('pembelian.process') }}" method="POST" class="mt-3">
        @csrf
        <input type="hidden" name="totalPembelian" value="{{ $totalPembelian }}">
        <button type="submit" class="btn btn-success">Proses Pembelian</button>
    </form>
</div>

<script>
    // Menambah stok ke keranjang
    document.getElementById('addMenuItem').addEventListener('click', function() {
        var menuItemsContainer = document.getElementById('menuItems');
        
        var menuItem = document.createElement('div');
        menuItem.classList.add('menu-item', 'mb-3');

        var selectStok = document.createElement('select');
        selectStok.name = "stok[]";
        selectStok.classList.add('form-control', 'stok');
        selectStok.innerHTML = `<option value="">Pilih Stok</option>
            @foreach($stokItems as $stok)
                <option value="{{ $stok->id_stok }}" data-jumlah="{{ $stok->jumlah_stok }}">{{ $stok->nama_stok }} (Jumlah: {{ $stok->jumlah_stok }})</option>
            @endforeach`;
        menuItem.appendChild(selectStok);

        var inputJumlah = document.createElement('input');
        inputJumlah.type = 'number';
        inputJumlah.name = "jumlah_item[]";
        inputJumlah.classList.add('form-control', 'jumlah', 'mt-2');
        inputJumlah.placeholder = 'Jumlah';
        inputJumlah.min = 1;
        menuItem.appendChild(inputJumlah);

        menuItemsContainer.appendChild(menuItem);
    });
</script>

@endsection