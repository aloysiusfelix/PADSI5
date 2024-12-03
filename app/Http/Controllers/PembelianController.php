<?php
namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Stok;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $pembelian = Pembelian::all(); // Retrieve all Pembelian records

        // Format hasil dengan menghitung total harga dan detail stok
        $formattedPembelian = [];
        $groupedPembelianByDate = [];

        // Mengelompokkan pembelian berdasarkan tanggal pembelian
        foreach ($pembelian as $item) {
            if ($item->tanggal_pembelian) {
                // Menggunakan Carbon untuk memastikan tanggal dibaca dengan benar
                $tanggalPembelian =  \Carbon\Carbon::parse($item->tanggal_pembelian)->format('Y-m-d'); // Format tanggal menjadi 'Y-m-d'
                $groupedPembelianByDate[$tanggalPembelian][] = $item; // Kelompokkan berdasarkan tanggal
            }
        }

        // Format data yang sudah dikelompokkan
        foreach ($groupedPembelianByDate as $tanggal => $items) {
            $totalPembelian = 0;
            $stokDetail = [];

            foreach ($items as $item) {
                // Pastikan total harga pembelian dan stok detail dihitung
                if ($item->total_harga_pembelian && $item->nama_stok) {
                    $totalPembelian += $item->total_harga_pembelian;

                    // Menambahkan detail stok dan jumlah
                    $stokDetail[$item->nama_stok] = isset($stokDetail[$item->nama_stok])
                        ? $stokDetail[$item->nama_stok] + $item->jumlah_item_pembelian
                        : $item->jumlah_item_pembelian;
                }
            }

            // Gabungkan detail stok menjadi string
            $stokDetailString = '';
            foreach ($stokDetail as $namaStok => $jumlah) {
                $stokDetailString .= "{$namaStok} {$jumlah}, ";
            }

            // Memasukkan data format transaksi
            $formattedPembelian[] = [
                'tanggal_pembelian' => $tanggal,
                'stok_detail' => rtrim($stokDetailString, ', '),
                'total_harga_pembelian' => number_format($totalPembelian, 0, ',', '.'),
                'id_pembelian' => $items[0]->id_pembelian, // Mengambil id_pembelian pertama untuk setiap grup tanggal
            ];
        }

        return view('pembelian.index', compact('formattedPembelian'));
    }

    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stokItems = Stok::all(); // Get all available stok items
        $cart = session()->get('cart', []); // Get cart from session
        return view('pembelian.create', compact('stokItems', 'cart'));
    }

    /**
     * Store items in the cart.
     */
    public function store(Request $request)
{
    $request->validate([
        'stok' => 'required|array|min:1',
        'stok.*' => 'required|exists:stok,id_stok', // validate each stok item
        'jumlah_item' => 'required|array|min:1',
        'jumlah_item.*' => 'required|integer|min:1', // validate each quantity
    ]);

    $cart = session()->get('cart', []); // Retrieve current cart

    foreach ($request->stok as $index => $stokId) {
        $stok = Stok::findOrFail($stokId); // Retrieve the stok
        $jumlahItem = $request->jumlah_item[$index]; // Get the quantity for each item
        $totalPembelian = $stok->harga_stok * $jumlahItem; // Calculate total for each item

        // Add item to the cart
        $cart[] = [
            'id_stok' => $stok->id_stok,
            'nama_stok' => $stok->nama_stok,
            'jumlah_item' => $jumlahItem, // Correct key name
            'harga_stok' => $stok->harga_stok,
            'total_pembelian' => $totalPembelian,
        ];
    }

    // Store the updated cart in session
    session(['cart' => $cart]);

    return redirect()->route('pembelian.create')->with('success', 'Item berhasil ditambahkan ke keranjang.');
}


    /**
     * Remove an item from the cart.
     */
    public function removeFromCart($index)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$index])) {
            unset($cart[$index]);
        }
        session()->put('cart', array_values($cart)); // Reindex the cart
        return redirect()->route('pembelian.create');
    }

    /**
     * Process the purchase and update stock quantities.
     */
    public function process(Request $request)
{
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->route('pembelian.create')->with('error', 'Keranjang kosong.');
    }

    $totalPembelian = 0;

    // Loop through each item in the cart to process the purchase
    foreach ($cart as $item) {
        $totalPembelian += $item['total_pembelian'];

        // Create the Pembelian record
        Pembelian::create([
            'id_pembelian' => 'PB' . strtoupper(Str::random(6)),
            'tanggal_pembelian' => now(),
            'id_stok' => $item['id_stok'],
            'nama_stok' => $item['nama_stok'],
            'jumlah_item_pembelian' => $item['jumlah_item'], // Correct key name
            'total_harga_pembelian' => $item['total_pembelian'],
        ]);

        // Increase stock quantity after the purchase (add to stock)
        $stok = Stok::findOrFail($item['id_stok']);
        $stok->jumlah_stok += $item['jumlah_item']; // Add stock based on the quantity in the cart
        $stok->save();
    }

    // Optionally, remove the cart after processing if needed
    session()->forget('cart'); // Remove the cart from session after purchase is processed

    return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil diproses.');
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

        $pembelian = Pembelian::findOrFail($id); // Find the Pembelian by ID

        // Update the purchase record with validated data
        $pembelian->update([
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'id_stok' => $request->id_stok,
            'jumlah_item_pembelian' => $request->jumlah_item_pembelian,
            'total_harga_pembelian' => $request->total_harga_pembelian,
        ]);

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);

        // Update stock before deleting the purchase (rollback logic)
        $stok = Stok::findOrFail($pembelian->id_stok);
        $stok->jumlah_stok += $pembelian->jumlah_item_pembelian; // Rollback the stock quantity
        $stok->save();

        $pembelian->delete(); // Delete the Pembelian record

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dihapus.');
    }
}