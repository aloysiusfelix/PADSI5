<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Jika ada pencarian, filter data berdasarkan 'nama_pelanggan'
        if ($search) {
            $pelanggans = Pelanggan::where('nama_pelanggan', 'like', '%' . $search . '%')->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua data
            $pelanggans = Pelanggan::all();
        }

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
            'no_hp_pelanggan' => 'required|unique:pelanggan,no_hp_pelanggan',
            'email_pelanggan' => 'required|email|unique:pelanggan,email_pelanggan',
            'poin_pelanggan' => 'nullable|integer',
        ], [
            'nama_pelanggan.required' => 'Nama pelanggan harus diisi.',
            'no_hp_pelanggan.required' => 'Nomor HP pelanggan harus diisi.',
            'no_hp_pelanggan.unique' => 'Nomor HP sudah digunakan.',
            'email_pelanggan.required' => 'Email pelanggan harus diisi.',
            'email_pelanggan.email' => 'Format email tidak valid.',
            'email_pelanggan.unique' => 'Email sudah digunakan.',
            'poin_pelanggan.integer' => 'Poin pelanggan harus berupa angka.',
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
            $pelanggan = Pelanggan::findOrFail($id_pelanggan);

            $request->validate([
                'nama_pelanggan' => 'required',
                'no_hp_pelanggan' => [
                    'required',
                    Rule::unique('pelanggan', 'no_hp_pelanggan')->ignore($pelanggan->id_pelanggan),
                ],
                'email_pelanggan' => [
                    'required',
                    'email',
                    Rule::unique('pelanggan', 'email_pelanggan')->ignore($pelanggan->id_pelanggan),
                ],
                'poin_pelanggan' => 'nullable|integer',
            ], [
                'nama_pelanggan.required' => 'Nama pelanggan harus diisi.',
                'no_hp_pelanggan.required' => 'Nomor HP pelanggan harus diisi.',
                'no_hp_pelanggan.unique' => 'Nomor HP sudah digunakan.',
                'email_pelanggan.required' => 'Email pelanggan harus diisi.',
                'email_pelanggan.email' => 'Format email tidak valid.',
                'email_pelanggan.unique' => 'Email sudah digunakan.',
                'poin_pelanggan.integer' => 'Poin pelanggan harus berupa angka.',
            ]);

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
