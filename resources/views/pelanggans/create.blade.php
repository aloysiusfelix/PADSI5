@extends('layouts.app')

@section('content')
    <h1>Tambah Pelanggan Baru</h1>

    <form action="{{ route('pelanggans.store') }}" method="POST">
        @csrf
        <div>
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" required>
        </div>

        <div>
            <label for="no_hp_pelanggan">No HP Pelanggan</label>
            <input type="text" name="no_hp_pelanggan" id="no_hp_pelanggan" required>
        </div>

        <div>
            <label for="email_pelanggan">Email Pelanggan</label>
            <input type="email" name="email_pelanggan" id="email_pelanggan" required>
        </div>

        <div>
            <label for="poin_pelanggan">Poin Pelanggan</label>
            <input type="number" name="poin_pelanggan" id="poin_pelanggan" min="0">
        </div>

        <button type="submit">Simpan</button>
    </form>
@endsection