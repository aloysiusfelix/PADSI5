@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Transaksi Penjualan</h1>

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
                <label for="id_menu" class="form-label">ID Menu</label>
                <input type="text" class="form-control" id="id_menu" name="id_menu" required>
            </div>
            <div class="mb-3">
                <label for="nama_menu" class="form-label">Nama Menu</label>
                <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_menu" class="form-label">Jumlah Menu</label>
                <input type="number" class="form-control" id="jumlah_menu" name="jumlah_menu" required>
            </div>
            <div class="mb-3">
                <label for="harga_menu" class="form-label">Harga Menu</label>
                <input type="number" step="0.01" class="form-control" id="harga_menu" name="harga_menu" required>
            </div>
            <div class="mb-3">
                <label for="total_penjualan" class="form-label">Total Penjualan</label>
                <input type="number" step="0.01" class="form-control" id="total_penjualan" name="total_penjualan" required>
            </div>
            <div class="mb-3">
                <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" required>
            </div>
            <div class="mb-3">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
