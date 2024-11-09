@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pembelian</h1>
    <form action="{{ route('pembelian.update', $pembelian->id_pembelian) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_pembelian" class="form-label">ID Pembelian</label>
            <input type="text" id="id_pembelian" name="id_pembelian" class="form-control" value="{{ $pembelian->id_pembelian }}" readonly>
        </div>
        <div class="mb-3">
            <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
            <input type="date" id="tanggal_pembelian" name="tanggal_pembelian" class="form-control" value="{{ $pembelian->tanggal_pembelian }}" required>
        </div>
        <div class="mb-3">
            <label for="id_stok" class="form-label">ID Stok</label>
            <input type="text" id="id_stok" name="id_stok" class="form-control" value="{{ $pembelian->id_stok }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_stok" class="form-label">Nama Stok</label>
            <input type="text" id="nama_stok" name="nama_stok" class="form-control" value="{{ $pembelian->nama_stok }}" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_item_pembelian" class="form-label">Jumlah Item Pembelian</label>
            <input type="number" id="jumlah_item_pembelian" name="jumlah_item_pembelian" class="form-control" value="{{ $pembelian->jumlah_item_pembelian }}" required>
        </div>
        <div class="mb-3">
            <label for="total_harga_pembelian" class="form-label">Total Harga Pembelian</label>
            <input type="number" id="total_harga_pembelian" name="total_harga_pembelian" class="form-control" value="{{ $pembelian->total_harga_pembelian }}" required>
        </div>
        <button type="submit" class="btn btn-success">Perbarui Pembelian</button>
    </form>
</div>
@endsection
