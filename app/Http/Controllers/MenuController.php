<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'nama_menu' => 'required|unique:menu,nama_menu', // Nama menu harus unik
            'harga_menu' => 'required|integer',
            'kategori_menu' => 'required',
            'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nama_menu.required' => 'Nama menu harus diisi.',
            'nama_menu.unique' => 'Nama menu sudah ada, gunakan nama yang berbeda.',
            'harga_menu.required' => 'Harga menu harus diisi.',
            'harga_menu.integer' => 'Harga menu harus berupa angka.',
            'kategori_menu.required' => 'Kategori menu harus diisi.',
            'gambar_menu.image' => 'Gambar menu harus berupa file gambar.',
            'gambar_menu.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif.',
            'gambar_menu.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_menu')) {
            $file = $request->file('gambar_menu');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/menus', $filename, 'public');
            $data['gambar_menu'] = $path;
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
        $menu = Menu::findOrFail($id_menu);

        $request->validate([
            'nama_menu' => [
                'required',
                Rule::unique('menu', 'nama_menu')->ignore($menu->id_menu), // Nama menu unik, kecuali untuk menu yang sedang diubah
            ],
            'harga_menu' => 'required|integer',
            'kategori_menu' => 'required',
            'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nama_menu.required' => 'Nama menu harus diisi.',
            'nama_menu.unique' => 'Nama menu sudah ada, gunakan nama yang berbeda.',
            'harga_menu.required' => 'Harga menu harus diisi.',
            'harga_menu.integer' => 'Harga menu harus berupa angka.',
            'kategori_menu.required' => 'Kategori menu harus diisi.',
            'gambar_menu.image' => 'Gambar menu harus berupa file gambar.',
            'gambar_menu.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif.',
            'gambar_menu.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_menu')) {
            $file = $request->file('gambar_menu');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/menus', $filename, 'public');
            $data['gambar_menu'] = $path;
        } else {
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
