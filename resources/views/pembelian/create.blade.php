@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pembelian</h1>
    <form action="{{ route('pembelian.store') }}" method="POST">
        @csrf
     
        <div class="mb-3">
            <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
            <input type="date" id="tanggal_pembelian" name="tanggal_pembelian" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nama_stok" class="form-label">Nama Stok</label>
            <select id="id_stok" name="id_stok" class="form-control" required>
                <option value="">Pilih Stok</option>
                @foreach($stokItems as $stok)
                    <option value="{{ $stok->id_stok }}" data-jumlah="{{ $stok->jumlah_stok }}">
                        {{ $stok->nama_stok }} (Jumlah: {{ $stok->jumlah_stok }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah_item_pembelian" class="form-label">Jumlah Item Pembelian</label>
            <input type="number" id="jumlah_item_pembelian" name="jumlah_item_pembelian" class="form-control" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Pembelian</button>
    </form>
</div>
@endsection
