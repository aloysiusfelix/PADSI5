@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pembelian</h1>
    <a href="{{ route('pembelian.create') }}" class="btn btn-primary mb-3">Tambah Pembelian</a>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Pembelian</th>
                <th>Tanggal Pembelian</th>
                <th>ID Stok</th>
                <th>Nama Stok</th>
                <th>Jumlah Item Pembelian</th>
                <th>Total Harga Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pembelian as $item)
                <tr>
                    <td>{{ $item->id_pembelian }}</td>
                    <td>{{ $item->tanggal_pembelian }}</td>
                    <td>{{ $item->id_stok }}</td>
                    <td>{{ $item->nama_stok }}</td>
                    <td>{{ $item->jumlah_item_pembelian }}</td>
                    <td>{{ number_format($item->total_harga_pembelian, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('pembelian.edit', $item->id_pembelian) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('pembelian.destroy', $item->id_pembelian) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data pembelian.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
