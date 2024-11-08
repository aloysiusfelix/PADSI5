<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggans.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'no_hp_pelanggan' => 'required',
            'email_pelanggan' => 'required|email',
            'poin_pelanggan' => 'nullable|integer',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggans.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function edit($id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        return view('pelanggans.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id_pelanggan)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'no_hp_pelanggan' => 'required',
            'email_pelanggan' => 'required|email',
            'poin_pelanggan' => 'nullable|integer',
        ]);

        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        $pelanggan->update($request->all());

        return redirect()->route('pelanggans.index')->with('success', 'Pelanggan berhasil diperbarui');
    }

    public function destroy($id_pelanggan)
    {
        $pelanggan = Pelanggan::findOrFail($id_pelanggan);
        $pelanggan->delete();

        return redirect()->route('pelanggans.index')->with('success', 'Pelanggan berhasil dihapus');
    }
}
