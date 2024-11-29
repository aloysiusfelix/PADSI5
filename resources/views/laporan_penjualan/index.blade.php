@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Penjualan</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <!-- Form untuk memilih periode laporan -->
    <form method="GET" action="{{ route('laporan_penjualan.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="{{ request('tanggal_awal') }}">
            </div>
            <div class="col-md-4">
                <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary mt-4">Cari Laporan</button>
            </div>
        </div>
    </form>

    <form method="GET" action="{{ route('laporan_penjualan.pdf') }}">
        <button type="submit" class="btn btn-success">Download PDF</button>
    </form>

    <!-- Menampilkan total keseluruhan penjualan -->
    <div class="alert alert-info">
            <strong>Total Keseluruhan Penjualan: Rp {{ $totalPenjualanFormatted }}</strong>
        </div>

    <!-- Tampilkan data jika tersedia -->
    @if(isset($formattedPenjualan) && count($formattedPenjualan) > 0)
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

    @elseif(isset($formattedPenjualan) && count($formattedPenjualan) == 0)
        <div class="alert alert-warning">
            Tidak ada data penjualan untuk periode yang dipilih.
        </div>
    @endif
</div>
@endsection
