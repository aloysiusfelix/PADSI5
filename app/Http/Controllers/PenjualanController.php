<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
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
        return view('penjualan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_penjualan' => 'required|unique:transaksi_penjualan',
            'tanggal_penjualan' => 'required|date',
            'id_menu' => 'required',
            'nama_menu' => 'required|string',
            'jumlah_menu' => 'required|integer',
            'harga_menu' => 'required|numeric',
            'total_penjualan' => 'required|numeric',
            'id_pelanggan' => 'required',
            'nama_pelanggan' => 'required|string',
        ]);

        Penjualan::create($request->all());

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
        return view('penjualan.edit', compact('penjualan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'id_menu' => 'required',
            'nama_menu' => 'required|string',
            'jumlah_menu' => 'required|integer',
            'harga_menu' => 'required|numeric',
            'total_penjualan' => 'required|numeric',
            'id_pelanggan' => 'required',
            'nama_pelanggan' => 'required|string',
        ]);

        $penjualan = Penjualan::findOrFail($id);
        $penjualan->update($request->all());

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