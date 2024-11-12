<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    // Menampilkan semua stok
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Jika ada pencarian, filter data berdasarkan 'nama_menu'
        if ($search) {
            $stoks = Stok::where('nama_stok', 'like', '%' . $search . '%')->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua data
            $stoks = Stok::all();
        }

        return view('stoks.index', compact('stoks'));
    }


    // Menyimpan data stok baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_stok' => 'required',
            'jumlah_stok' => 'required|integer',
            'kategori_stok' => 'required',
            'harga_stok' => 'required|numeric',
            'gambar_stok' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        $data = $request->all();

        // Cek apakah file gambar diunggah
        if ($request->hasFile('gambar_stok')) {
            $file = $request->file('gambar_stok');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/stoks', $filename, 'public');
            $data['gambar_stok'] = $path; // Simpan path gambar ke database
        }

        Stok::create($data);

        return redirect()->route('stoks.index')
            ->with('success', 'Stok berhasil ditambahkan');
    }

    // Menampilkan form edit untuk stok tertentu
    public function edit($id_stok)
    {
        $stok = Stok::findOrFail($id_stok);
        return view('stoks.edit', compact('stok'));
    }

    // Memperbarui data stok
    public function update(Request $request, $id_stok)
    {
        $request->validate([
            'nama_stok' => 'required',
            'jumlah_stok' => 'required|integer',
            'kategori_stok' => 'required',
            'harga_stok' => 'required|numeric',
            'gambar_stok' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $stok = Stok::findOrFail($id_stok);
        $data = $request->all();

        // Cek apakah file gambar baru diunggah
        if ($request->hasFile('gambar_stok')) {
            $file = $request->file('gambar_stok');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/stoks', $filename, 'public');
            $data['gambar_stok'] = $path;
        } else {
            // Jika tidak ada gambar baru yang diunggah, hapus gambar dari data update
            unset($data['gambar_stok']);
        }

        $stok->update($data);

        return redirect()->route('stoks.index')
            ->with('success', 'Stok berhasil diperbarui');
    }

    // Menghapus stok
    public function destroy($id_stok)
    {
        $stok = Stok::findOrFail($id_stok);
        $stok->delete();

        return redirect()->route('stoks.index')
            ->with('success', 'Stok berhasil dihapus');
    }
}