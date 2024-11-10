<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Menu;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil data menu dan pelanggan untuk ditampilkan di form
        $menuItems = Menu::all();
        $pelangganItems = Pelanggan::all();

        // Ambil data keranjang yang disimpan dalam sesi
        $cart = session()->get('cart', []);

        return view('penjualan.create', compact('menuItems', 'pelangganItems', 'cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu' => 'required|array|min:1',
            'menu.*' => 'required|exists:menu,id_menu',
            'jumlah' => 'required|array|min:1',
            'jumlah.*' => 'required|integer|min:1',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
        ]);

        $pelanggan = Pelanggan::findOrFail($request->id_pelanggan);
        $cart = session()->get('cart', []);

        foreach ($request->menu as $index => $menuId) {
            $menu = Menu::findOrFail($menuId);
            $jumlahMenu = $request->jumlah[$index];
            $totalPenjualan = $menu->harga_menu * $jumlahMenu;

            $cart[] = [
                'id_menu' => $menu->id_menu,
                'nama_menu' => $menu->nama_menu,
                'jumlah_menu' => $jumlahMenu,
                'harga_menu' => $menu->harga_menu,
                'total_penjualan' => $totalPenjualan,
                'id_pelanggan' => $pelanggan->id_pelanggan,
                'nama_pelanggan' => $pelanggan->nama_pelanggan,
            ];
        }

        session(['cart' => $cart]);

        return redirect()->route('penjualan.create')->with('success', 'Menu berhasil ditambahkan ke keranjang.');
    }

    // Menghapus item dari keranjang
    public function removeFromCart($index)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$index])) {
            unset($cart[$index]);
        }
        session()->put('cart', array_values($cart));
        return redirect()->route('penjualan.create');
    }

    // Memproses transaksi yang ada di dalam keranjang
    public function process()
    {
        $cart = session()->get('cart', []);
        foreach ($cart as $item) {
            Penjualan::create([
                'id_penjualan' => 'P' . strtoupper(Str::random(6)), // ID penjualan unik
                'tanggal_penjualan' => now(),
                'id_menu' => $item['id_menu'],
                'nama_menu' => $item['nama_menu'],
                'jumlah_menu' => $item['jumlah_menu'],
                'harga_menu' => $item['harga_menu'],
                'total_penjualan' => $item['total_penjualan'],
                'id_pelanggan' => $item['id_pelanggan'],
                'nama_pelanggan' => $item['nama_pelanggan'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('penjualan.index')->with('success', 'Transaksi berhasil diproses.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        return view('penjualan.show', compact('penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $menuItems = Menu::all();
        $pelangganItems = Pelanggan::all();
        return view('penjualan.edit', compact('penjualan', 'menuItems', 'pelangganItems'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'id_menu' => 'required|exists:menu,id_menu',
            'jumlah_menu' => 'required|integer',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
        ]);

        $penjualan = Penjualan::findOrFail($id);

        // Ambil data menu dan pelanggan
        $menu = Menu::findOrFail($request->id_menu);
        $pelanggan = Pelanggan::findOrFail($request->id_pelanggan);
        $total_penjualan = $menu->harga_menu * $request->jumlah_menu;

        $penjualan->update([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'id_menu' => $menu->id_menu,
            'nama_menu' => $menu->nama_menu,
            'jumlah_menu' => $request->jumlah_menu,
            'harga_menu' => $menu->harga_menu,
            'total_penjualan' => $total_penjualan,
            'id_pelanggan' => $pelanggan->id_pelanggan,
            'nama_pelanggan' => $pelanggan->nama_pelanggan,
        ]);

        return redirect()->route('penjualan.index')
                         ->with('success', 'Transaksi penjualan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('penjualan.index')
                         ->with('success', 'Transaksi penjualan berhasil dihapus.');
    }
}