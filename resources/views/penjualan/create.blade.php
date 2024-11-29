@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Transaksi Penjualan</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
            <input type="text" class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
        </div>


        <div class="mb-3">
            <label for="id_menu" class="form-label">Menu</label>
            <div class="menu-items" id="menuItems">
                <div class="menu-item">
                    <select name="menu[]" class="form-control menu" required>
                        <option value="">Pilih Menu</option>
                        @foreach($menuItems as $menu)
                            <option value="{{ $menu->id_menu }}" data-harga="{{ $menu->harga_menu }}">
                                {{ $menu->nama_menu }} - Rp{{ number_format($menu->harga_menu, 2) }}
                            </option>
                        @endforeach
                    </select>
                    <input type="number" name="jumlah[]" class="form-control jumlah" placeholder="Jumlah" required min="1">
                </div>
            </div>
            <button type="button" class="btn btn-secondary" id="addMenuItem">Tambah Menu</button>
        </div>

        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">Pelanggan</label>
            <select id="id_pelanggan" name="id_pelanggan" class="form-control" required>
                <option value="">Pilih Pelanggan</option>
                @foreach($pelangganItems as $pelanggan)
                    <option value="{{ $pelanggan->id_pelanggan }}">{{ $pelanggan->nama_pelanggan }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
    </form>

    <h2 class="mt-5">Keranjang</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Poin</th>
                <th>Pelanggan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $totalPoints = 0; @endphp
            @foreach($cart as $index => $item)
                @php
                    $itemPoints = $item['jumlah_menu'] * 1;

                    $pelanggan = App\Models\Pelanggan::find($item['id_pelanggan']);
                    $pelangganPoints = $pelanggan ? $pelanggan->poin_pelanggan : 0;


                    $totalPoints = ($totalPoints == 0) 
                        ? $itemPoints + $pelangganPoints // Pertama kali, tambahkan poin pelanggan
                        : $totalPoints + $itemPoints;   // Tambahkan poin item berikutnya
                @endphp
                <tr>
                    <td>{{ $item['nama_menu'] }}</td>
                    <td>{{ $item['jumlah_menu'] }}</td>
                    <td>Rp{{ number_format($item['harga_menu'], 2) }}</td>
                    <td>Rp{{ number_format($item['total_penjualan'], 2) }}</td>
                    <td>{{ $itemPoints }}</td>
                    <td>{{ $item['nama_pelanggan'] }}</td>
                    <td>
                        <form action="{{ route('penjualan.removeFromCart', $index) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-between mt-3">
        <h4>Total Keranjang</h4>
        <h4>Rp {{ number_format(array_sum(array_column($cart, 'total_penjualan')), 2) }}</h4>
    </div>

    <h4>Total Poin: <span class="total-poin">{{ $totalPoints }}</span> Poin</h4>

    <!-- Bagian Perhitungan Total -->
    <div class="mt-4">
        <h4>Total Perhitungan</h4>

        <div class="mb-3">
            <label class="form-label">Gunakan Poin sebagai Diskon?</label>
            <input type="checkbox" id="usePoints" name="usePoints" value="1">
        </div>

        <!-- Input untuk Diskon -->
        <div class="mb-3">
            <label for="diskon" class="form-label">Diskon (Rp)</label>
            <input type="number" class="form-control" id="diskon" name="diskon" value="0" min="0">
        </div>

        <!-- Input untuk Nominal Pembayaran -->
        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal Pembayaran (Rp)</label>
            <input type="number" class="form-control" id="nominal" name="nominal" required min="0">
        </div>

        <div class="d-flex justify-content-between mt-3">
            <h5>Total setelah Diskon:</h5>
            <h5 id="totalKeranjang">Rp {{ number_format(array_sum(array_column($cart, 'total_penjualan')), 2) }}</h5>
        </div>
        <div class="d-flex justify-content-between mt-3">
            <h5>Kembalian:</h5>
            <h5 id="kembalian">Rp 0</h5>
        </div>

        <button type="button" class="btn btn-warning mt-3" onclick="calculateChange()">Hitung</button>
    </div>

    <form action="{{ route('penjualan.process') }}" method="POST" class="mt-3">
        @csrf
        <input type="hidden" name="totalPoints" value="{{ $totalPoints }}">
        <input type="hidden" id="usePointsHidden" name="usePoints" value="0">
        <button type="submit" class="btn btn-success">Proses Transaksi</button>
    </form>


    
</div>

<script>
    document.getElementById('addMenuItem').addEventListener('click', function() {
        var menuItemsContainer = document.getElementById('menuItems');
        
        var menuItem = document.createElement('div');
        menuItem.classList.add('menu-item', 'mb-3');

        var selectMenu = document.createElement('select');
        selectMenu.name = "menu[]";
        selectMenu.classList.add('form-control', 'menu');
        selectMenu.innerHTML = `<option value="">Pilih Menu</option>
            @foreach($menuItems as $menu)
                <option value="{{ $menu->id_menu }}" data-harga="{{ $menu->harga_menu }}">{{ $menu->nama_menu }} - Rp{{ number_format($menu->harga_menu, 2) }}</option>
            @endforeach`;
        menuItem.appendChild(selectMenu);

        var inputJumlah = document.createElement('input');
        inputJumlah.type = 'number';
        inputJumlah.name = "jumlah[]";
        inputJumlah.classList.add('form-control', 'jumlah', 'mt-2');
        inputJumlah.placeholder = 'Jumlah';
        inputJumlah.min = 1;
        menuItem.appendChild(inputJumlah);

        menuItemsContainer.appendChild(menuItem);
    });

    function calculateChange() {
        const totalKeranjang = {{ array_sum(array_column($cart, 'total_penjualan')) }};
        const diskon = parseFloat(document.getElementById('diskon').value) || 0;
        const nominal = parseFloat(document.getElementById('nominal').value) || 0;

        // Validasi diskon agar tidak lebih besar dari total keranjang
        if (diskon > totalKeranjang) {
            alert('Diskon tidak boleh melebihi total keranjang.');
            return;
        }

        const totalAfterDiscount = totalKeranjang - diskon;
        const kembalian = nominal - totalAfterDiscount;

        document.getElementById('totalKeranjang').innerText = `Rp ${totalAfterDiscount.toLocaleString('id-ID')}`;
        document.getElementById('kembalian').innerText = `Rp ${Math.max(kembalian, 0).toLocaleString('id-ID')}`;

        if (kembalian < 0) {
            alert('Nominal tidak mencukupi total pembayaran setelah diskon.');
        }
    }


    document.getElementById('usePoints').addEventListener('change', function () {
        const totalKeranjang = {{ array_sum(array_column($cart, 'total_penjualan')) }};
        const totalPoints = {{ $totalPoints }};
        const pointValue = 1000; // Nilai per poin (Rp1.000)
        const hiddenInput = document.getElementById('usePointsHidden');
        hiddenInput.value = this.checked ? "1" : "0";

        let diskon = 0;

        if (this.checked) {
            // Hitung diskon berdasarkan poin
            diskon = Math.min(totalPoints * pointValue, totalKeranjang);

            // Tampilkan diskon di input diskon
            document.getElementById('diskon').value = diskon;

            // Set total poin ke 0 di frontend
            document.querySelector('.total-poin').innerText = "0";
        } else {
            // Kembalikan ke default
            document.getElementById('diskon').value = 0;

            // Tampilkan kembali total poin asli
            document.querySelector('.total-poin').innerText = `${totalPoints}`;
        }

        // Perbarui total setelah diskon
        const totalAfterDiscount = totalKeranjang - diskon;
        document.getElementById('totalKeranjang').innerText = `Rp ${totalAfterDiscount.toLocaleString('id-ID')}`;
    });

</script>
@endsection