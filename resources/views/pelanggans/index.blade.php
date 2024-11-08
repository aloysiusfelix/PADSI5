@extends('layouts.app')

@section('content')
    <h1>Daftar Pelanggan</h1>

    <a href="{{ route('pelanggans.create') }}" style="margin-bottom: 10px; display: inline-block;">Tambah Pelanggan</a>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Poin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->nama_pelanggan }}</td>
                    <td>{{ $pelanggan->no_hp_pelanggan }}</td>
                    <td>{{ $pelanggan->email_pelanggan }}</td>
                    <td>{{ $pelanggan->poin_pelanggan ?? 0 }}</td>
                    <td>
                        <a href="{{ route('pelanggans.edit', $pelanggan->id_pelanggan) }}">Edit</a>
                        <form action="{{ route('pelanggans.destroy', $pelanggan->id_pelanggan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection