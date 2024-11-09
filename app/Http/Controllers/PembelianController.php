<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = Pembelian::all();
        return view('pembelian.index', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pembelian' => 'required|unique:transaksi_pembelian',
            'tanggal_pembelian' => 'required|date',
            'id_stok' => 'required',
            'nama_stok' => 'required|string',
            'jumlah_item_pembelian' => 'required|integer',
            'total_harga_pembelian' => 'required|numeric',
        ]);

        Pembelian::create($request->all());

        return redirect()->route('pembelian.index')
                         ->with('success', 'Transaksi pembelian berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('pembelian.show', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('pembelian.edit', compact('pembelian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'id_stok' => 'required',
            'nama_stok' => 'required|string',
            'jumlah_item_pembelian' => 'required|integer',
            'total_harga_pembelian' => 'required|numeric',
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->update($request->all());

        return redirect()->route('pembelian.index')
                         ->with('success', 'Transaksi pembelian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index')
                         ->with('success', 'Transaksi pembelian berhasil dihapus.');
    }
}
