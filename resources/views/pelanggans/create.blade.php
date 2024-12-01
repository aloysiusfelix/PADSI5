@extends('layouts.app')

@section('content')
    <h1>Tambah Pelanggan Baru</h1>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">

    {{-- SweetAlert untuk menampilkan pesan error --}}
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '{!! implode("<br>", $errors->all()) !!}',
            });
        </script>
    @endif

    <form action="{{ route('pelanggans.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" id="nama_pelanggan" required value="{{ old('nama_pelanggan') }}">
            @if ($errors->has('nama_pelanggan'))
                <div class="error">{{ $errors->first('nama_pelanggan') }}</div>
            @endif
        </div>

        <div>
            <label for="no_hp_pelanggan">No HP Pelanggan</label>
            <input type="text" name="no_hp_pelanggan" id="no_hp_pelanggan" required value="{{ old('no_hp_pelanggan') }}">
            @if ($errors->has('no_hp_pelanggan'))
                <div class="error">{{ $errors->first('no_hp_pelanggan') }}</div>
            @endif
        </div>

        <div>
            <label for="email_pelanggan">Email Pelanggan</label>
            <input type="email" name="email_pelanggan" id="email_pelanggan" required value="{{ old('email_pelanggan') }}">
            @if ($errors->has('email_pelanggan'))
                <div class="error">{{ $errors->first('email_pelanggan') }}</div>
            @endif
        </div>

        <div>
            <label for="poin_pelanggan">Poin Pelanggan</label>
            <input type="number" name="poin_pelanggan" id="poin_pelanggan" min="0" value="{{ old('poin_pelanggan') }}">
            @if ($errors->has('poin_pelanggan'))
                <div class="error">{{ $errors->first('poin_pelanggan') }}</div>
            @endif
        </div>

        <button type="submit">Simpan</button>
    </form>
@endsection
