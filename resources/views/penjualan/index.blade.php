@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Transaksi Penjualan</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Penjualan</a>

    @if (empty($formattedPenjualan))
        <div class="alert alert-info">
            Belum ada data transaksi penjualan.
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Penjualan</th>
                    <th>Tanggal Penjualan</th>
                    <th>Menu Detail</th>
                    <th>Total Penjualan</th>
                    <th>Pelanggan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($formattedPenjualan as $penjualan)
                    <tr>
                        <td>{{ $penjualan['id_penjualan'] }}</td>
                        <td>{{ $penjualan['tanggal_penjualan'] }}</td>
                        <td>{{ $penjualan['menu_detail'] }}</td>
                        <td>Rp {{ $penjualan['total_penjualan'] }}</td>
                        <td>{{ $penjualan['nama_pelanggan'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
