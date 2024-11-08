@extends('layouts.app')

@section('content')
    <h1>Edit Pelanggan</h1>

    <form action="{{ route('pelanggans.update', $pelanggan->id_pelanggan) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}" required>
        </div>

        <div>
            <label for="no_hp_pelanggan">No HP Pelanggan</label>
            <input type="text" name="no_hp_pelanggan" id="no_hp_pelanggan" value="{{ old('no_hp_pelanggan', $pelanggan->no_hp_pelanggan) }}" required>
        </div>

        <div>
            <label for="email_pelanggan">Email Pelanggan</label>
            <input type="email" name="email_pelanggan" id="email_pelanggan" value="{{ old('email_pelanggan', $pelanggan->email_pelanggan) }}" required>
        </div>

        <div>
            <label for="poin_pelanggan">Poin Pelanggan</label>
            <input type="number" name="poin_pelanggan" id="poin_pelanggan" value="{{ old('poin_pelanggan', $pelanggan->poin_pelanggan) }}" min="0">
        </div>

        <button type="submit">Simpan Perubahan</button>
    </form>
@endsection