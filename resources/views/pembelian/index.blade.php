@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pembelian</h1>
    <a href="{{ route('pembelian.create') }}" class="btn btn-primary mb-3">Tambah Pembelian</a>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @if(count($formattedPembelian) > 0)
            <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID Pembelian</th>
                <th>Tanggal Pembelian</th>
                <th>Stok Detail</th>
                <th>Total Harga Pembelian</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formattedPembelian as $pembelian)
            <tr>
                <td>{{ $pembelian['id_pembelian'] }}</td>
                <td>{{ $pembelian['tanggal_pembelian'] }}</td>
                <td>{{ $pembelian['stok_detail'] }}</td>
                <td>{{ $pembelian['total_harga_pembelian'] }}</td>
            </tr>
        @endforeach
    </tbody>
            </table>
        @else
            <p>Tidak ada data pembelian yang tersedia.</p>
        @endif
    </div>
@endsection
