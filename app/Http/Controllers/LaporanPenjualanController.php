<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    /**
     * Menampilkan laporan penjualan.
     */
    public function index()
    {
        // Mengambil semua data penjualan
        $penjualan = Penjualan::all();

        // Mengirim data penjualan ke tampilan laporan
        return view('laporan_penjualan.index', compact('penjualan'));
    }
}