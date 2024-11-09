@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Transaksi Penjualan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_penjualan" class="form-label">ID Penjualan</label>
            <input type="text" class="form-control" id="id_penjualan" name="id_penjualan" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
            <input type="date" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" required>
        </div>
        <div class="mb-3">
            <label for="id_menu" class="form-label">Menu</label>
            <select id="id_menu" name="id_menu" class="form-control" required>
                <option value="">Pilih Menu</option>
                @foreach($menuItems as $menu)
                    <option value="{{ $menu->id_menu }}">{{ $menu->nama_menu }} - Rp{{ number_format($menu->harga_menu, 2) }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah_menu" class="form-label">Jumlah Menu</label>
            <input type="number" class="form-control" id="jumlah_menu" name="jumlah_menu" required>
        </div>
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">Pelanggan</label>
            <select id="id_pelanggan" name="id_pelanggan" class="form-control" required>
                <option value="">Pilih Pelanggan</option>
                @foreach($pelangganItems as $pelanggan)
                    <option value="{{ $pelanggan->id_pelanggan }}">{{ $pelanggan->nama_pelanggan }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
