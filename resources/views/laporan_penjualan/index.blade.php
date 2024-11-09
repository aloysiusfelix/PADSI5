@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Laporan Penjualan</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Penjualan</th>
                <th>Tanggal Penjualan</th>
                <th>Nama Menu</th>
                <th>Jumlah</th>
                <th>Harga Menu</th>
                <th>Total Penjualan</th>
                <!-- <th>ID Pelanggan</th> -->
                <th>Nama Pelanggan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualan as $item)
                <tr>
                    <td>{{ $item->id_penjualan }}</td>
                    <td>{{ $item->tanggal_penjualan }}</td>
                    <td>{{ $item->nama_menu }}</td>
                    <td>{{ $item->jumlah_menu }}</td>
                    <td>{{ number_format($item->harga_menu, 2, ',', '.') }}</td>
                    <td>{{ number_format($item->total_penjualan, 2, ',', '.') }}</td>
                    <!-- <td>{{ $item->id_pelanggan }}</td> -->
                    <td>{{ $item->nama_pelanggan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
