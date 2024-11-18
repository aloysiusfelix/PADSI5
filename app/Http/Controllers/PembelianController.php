<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    /**
     * Store a newly created purchase in storage and update stock quantity.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pembelian' => 'required|date',
            'id_stok' => 'required|exists:stok,id_stok',
            'jumlah_item_pembelian' => 'required|integer|min:1',
        ]);

        // Retrieve selected stock item
        $stok = Stok::findOrFail($request->id_stok);

        // Generate unique ID pembelian
        $id_pembelian = 'PB' . strtoupper(Str::random(6));

        // Calculate total price
        $total_harga_pembelian = $stok->harga_stok * $request->jumlah_item_pembelian;

        // Create the purchase record
        Pembelian::create([
            'id_pembelian' => $id_pembelian,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'id_stok' => $stok->id_stok,
            'nama_stok' => $stok->nama_stok,
            'jumlah_item_pembelian' => $request->jumlah_item_pembelian,
            'total_harga_pembelian' => $total_harga_pembelian,
        ]);

        // Update stock quantity
        $stok->jumlah_stok += $request->jumlah_item_pembelian;
        $stok->save();

        return redirect()->route('pembelian.index')
                         ->with('success', 'Transaksi pembelian berhasil dibuat dan stok diperbarui.');
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
            'id_stok' => 'required|exists:stok,id_stok',
            'jumlah_item_pembelian' => 'required|integer|min:1',
            'total_harga_pembelian' => 'required|numeric',
        ]);

        $pembelian = Pembelian::findOrFail($id);

        // Update the purchase record with validated data
        $pembelian->update([
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'id_stok' => $request->id_stok,
            'jumlah_item_pembelian' => $request->jumlah_item_pembelian,
            'total_harga_pembelian' => $request->total_harga_pembelian,
        ]);

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