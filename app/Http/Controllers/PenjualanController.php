<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Menu;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

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
        // Ambil semua data menu dan pelanggan untuk dropdown
        $menuItems = Menu::all();
        $pelangganItems = Pelanggan::all();
        
        return view('penjualan.create', compact('menuItems', 'pelangganItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_penjualan' => 'required|unique:transaksi_penjualan',
            'tanggal_penjualan' => 'required|date',
            'id_menu' => 'required|exists:menu,id_menu',
            'jumlah_menu' => 'required|integer',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
        ]);

        // Ambil data menu yang dipilih untuk mendapatkan harga
        $menu = Menu::findOrFail($request->id_menu);
        $pelanggan = Pelanggan::findOrFail($request->id_pelanggan);
        $total_penjualan = $menu->harga_menu * $request->jumlah_menu;

        // Buat penjualan baru
        Penjualan::create([
            'id_penjualan' => $request->id_penjualan,
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'id_menu' => $menu->id_menu,
            'nama_menu' => $menu->nama_menu, // Ambil nama dari relasi menu
            'jumlah_menu' => $request->jumlah_menu,
            'harga_menu' => $menu->harga_menu, // Ambil harga dari menu
            'total_penjualan' => $total_penjualan,
            'id_pelanggan' => $pelanggan->id_pelanggan,
            'nama_pelanggan' => $pelanggan->nama_pelanggan, // Ambil nama pelanggan
        ]);

        return redirect()->route('penjualan.index')
                         ->with('success', 'Transaksi penjualan berhasil dibuat.');
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