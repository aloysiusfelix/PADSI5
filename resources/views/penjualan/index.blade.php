@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Transaksi Penjualan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Penjualan</a>

    @if ($penjualan->isEmpty())
        <div class="alert alert-info">
            Belum ada data transaksi penjualan.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Penjualan</th>
                    <th>Tanggal Penjualan</th>
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Total Penjualan</th>
                    <th>Pelanggan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan as $item)
                    <tr>
                        <td>{{ $item->id_penjualan }}</td>
                        <td>{{ $item->tanggal_penjualan }}</td>
                        <td>{{ $item->nama_menu }}</td>
                        <td>{{ $item->jumlah_menu }}</td>
                        <td>{{ number_format($item->total_penjualan, 2) }}</td>
                        <td>{{ $item->nama_pelanggan }}</td>
                        <td>
                            <a href="{{ route('penjualan.edit', $item->id_penjualan) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('penjualan.destroy', $item->id_penjualan) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
