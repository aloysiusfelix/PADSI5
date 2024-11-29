@extends('layouts.app')

@section('content')
<div class="container text-center" style="margin-top: 10%; color: #555;">
    <h1 style="font-size: 80px; font-weight: bold; color: #d9534f;">Visca Barca, Visca Cataluna</h1>
    <h3>Unauthorized</h3>
    <p>Anda tidak memiliki izin untuk mengakses halaman ini. Silakan hubungi administrator jika diperlukan.</p>
    <a href="{{ route('penjualan.index') }}" class="btn btn-primary btn-lg mt-3">Kembali ke Penjualan</a>
</div>
@endsection
