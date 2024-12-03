@extends('layouts.app')

@section('content')
<div class="container">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <h1>Laporan Pembelian</h1>

    <!-- Form untuk filter berdasarkan tanggal -->
    <form method="GET" action="{{ route('laporan_pembelian.index') }}">
        <div class="row">
            <div class="col-md-4">
                <label for="tanggal_awal">Tanggal Awal</label>
                <input type="date" name="tanggal_awal" class="form-control" value="{{ request('tanggal_awal') }}">
            </div>
            <div class="col-md-4">
                <label for="tanggal_akhir">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
            </div>
            <div class="col-md-4 mt-4">
                <button type="submit" class="btn btn-primary mt-2">Filter</button>
            </div>
            <!-- Link untuk mengunduh PDF -->
            <a href="{{ route('laporan_pembelian.downloadPDF', ['tanggal_awal' => request('tanggal_awal'), 'tanggal_akhir' => request('tanggal_akhir')]) }}" class="btn btn-success mt-3">Unduh Laporan PDF</a>
        </div>
    </form>

    <!-- Tampilkan pesan error jika tidak ada data -->
    @if(isset($errorMessage))
        <div class="alert alert-warning mt-3">
            {{ $errorMessage }}
        </div>
    @endif

    <!-- Tabel laporan pembelian -->
    @if(count($formattedPembelian) > 0)
    <table class="table table-bordered mt-4">
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
                    <td>{{ $pembelian['id_pembelian'] }}</td> <!-- Tampilkan ID Pembelian -->
                    <td>{{ $pembelian['tanggal_pembelian'] }}</td>
                    <td>{{ $pembelian['stok_detail'] }}</td>
                    <td>{{ $pembelian['total_harga_pembelian'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Menampilkan Total Keseluruhan Pembelian -->
    <div class="mt-3">
        <h3>Total Keseluruhan Pembelian: Rp {{ $totalKeseluruhanFormatted }}</h3>
    </div>
    @endif

</div>
@endsection
