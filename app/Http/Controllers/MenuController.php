<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Menampilkan semua menu
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Jika ada pencarian, filter data berdasarkan 'nama_menu'
        if ($search) {
            $menus = Menu::where('nama_menu', 'like', '%' . $search . '%')->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua data
            $menus = Menu::all();
        }

        return view('menus.index', compact('menus'));
    }


    // Menampilkan form untuk menambah menu baru
    public function create()
    {
        return view('menus.create');
    }

    // Menyimpan data menu baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga_menu' => 'required|integer',
            'kategori_menu' => 'required',
            'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        $data = $request->all();

        // Cek apakah file gambar diunggah
        if ($request->hasFile('gambar_menu')) {
            $file = $request->file('gambar_menu');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/menus', $filename, 'public');
            $data['gambar_menu'] = $path; // Simpan path gambar ke database
        }

        Menu::create($data);

        return redirect()->route('menus.index')
            ->with('success', 'Menu berhasil ditambahkan');
    }


    // Menampilkan form edit untuk menu tertentu
    public function edit($id_menu)
    {
        $menu = Menu::findOrFail($id_menu);
        return view('menus.edit', compact('menu'));
    }

    // Memperbarui data menu
    public function update(Request $request, $id_menu)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga_menu' => 'required|integer',
            'kategori_menu' => 'required',
            'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        $menu = Menu::findOrFail($id_menu);
        $data = $request->all();

        // Cek apakah file gambar baru diunggah
        if ($request->hasFile('gambar_menu')) {
            $file = $request->file('gambar_menu');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/menus', $filename, 'public');
            $data['gambar_menu'] = $path; // Simpan path gambar baru
        } else {
            // Jika tidak ada gambar baru yang diunggah, hapus gambar dari data update
            unset($data['gambar_menu']);
        }

        $menu->update($data);

        return redirect()->route('menus.index')
            ->with('success', 'Menu berhasil diperbarui');
    }


    // Menghapus menu
    public function destroy($id_menu)
    {
        $menu = Menu::findOrFail($id_menu);
        $menu->delete();

        return redirect()->route('menus.index')
            ->with('success', 'Menu berhasil dihapus');
    }
}