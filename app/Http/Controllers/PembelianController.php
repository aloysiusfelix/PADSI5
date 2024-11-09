<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Stok;
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
        $stokItems = Stok::all();
        return view('pembelian.create', compact('stokItems'));
    }

    public function store(Request $request)
{
    $request->validate([
        'id_pembelian' => 'required|unique:transaksi_pembelian',
        'tanggal_pembelian' => 'required|date',
        'id_stok' => 'required|exists:stok,id_stok',
        'jumlah_item_pembelian' => 'required|integer',
    ]);

    // Ambil data stok yang dipilih untuk mendapatkan harga per unit dan jumlah stok
    $stok = Stok::findOrFail($request->id_stok);

    // Validasi apakah jumlah item yang dibeli tidak melebihi jumlah stok
    if ($request->jumlah_item_pembelian > $stok->jumlah_stok) {
        return back()->withErrors(['jumlah_item_pembelian' => 'Jumlah item melebihi jumlah stok yang tersedia.']);
    }

    $total_harga_pembelian = $stok->harga_stok * $request->jumlah_item_pembelian;

    Pembelian::create([
        'id_pembelian' => $request->id_pembelian,
        'tanggal_pembelian' => now(),
        'id_stok' => $stok->id_stok,
        'nama_stok' => $stok->nama_stok,
        'jumlah_item_pembelian' => $request->jumlah_item_pembelian,
        'total_harga_pembelian' => $total_harga_pembelian,
    ]);

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
