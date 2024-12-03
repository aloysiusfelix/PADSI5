<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF; // Import facade PDF

class LaporanPembelianController extends Controller
{
    public function index(Request $request)
{
    // Ambil input tanggal awal dan tanggal akhir dari request
    $tanggalAwal = $request->input('tanggal_awal');
    $tanggalAkhir = $request->input('tanggal_akhir');

    // Periksa apakah tanggal awal dan akhir telah diisi
    if ($tanggalAwal && $tanggalAkhir) {
        // Convert tanggal input ke format Y-m-d (menggunakan Carbon)
        $tanggalAwal = Carbon::parse($tanggalAwal)->startOfDay();
        $tanggalAkhir = Carbon::parse($tanggalAkhir)->endOfDay();

        // Query untuk mengambil data antara tanggal awal dan akhir
        $pembelian = Pembelian::whereBetween('tanggal_pembelian', [$tanggalAwal, $tanggalAkhir])->get();
    } else {
        // Jika tidak ada filter tanggal, ambil semua data pembelian
        $pembelian = Pembelian::all();
    }

    // Jika tidak ada data pembelian yang ditemukan
    if ($pembelian->isEmpty()) {
        return view('laporan_pembelian.index', [
            'formattedPembelian' => [],
            'totalKeseluruhanFormatted' => '0',
            'errorMessage' => 'Tidak ada transaksi pembelian yang ditemukan pada rentang tanggal yang dipilih.'
        ]);
    }

    // Format data untuk ditampilkan
    $formattedPembelian = [];
    $groupedPembelianByDate = [];

    // Mengelompokkan pembelian berdasarkan tanggal pembelian
    foreach ($pembelian as $item) {
        if ($item->tanggal_pembelian) {
            // Menggunakan Carbon untuk memastikan tanggal dibaca dengan benar
            $tanggalPembelian = Carbon::parse($item->tanggal_pembelian)->format('Y-m-d'); // Format tanggal menjadi 'Y-m-d'
            $groupedPembelianByDate[$tanggalPembelian][] = $item; // Kelompokkan berdasarkan tanggal
        }
    }

    // Format data yang sudah dikelompokkan
    $totalKeseluruhan = 0; // Variabel untuk total keseluruhan

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
            'tanggal_pembelian' => $tanggal, // Tanggal pembelian
            'stok_detail' => rtrim($stokDetailString, ', '), // Menghilangkan koma terakhir
            'total_harga_pembelian' => number_format($totalPembelian, 0, ',', '.'), // Format total harga pembelian
            'id_pembelian' => $items[0]->id_pembelian, // Mengambil id_pembelian pertama dari grup tanggal
        ];

        // Tambahkan total harga pembelian ke total keseluruhan
        $totalKeseluruhan += $totalPembelian;
    }

    // Format total keseluruhan
    $totalKeseluruhanFormatted = number_format($totalKeseluruhan, 0, ',', '.');

    return view('laporan_pembelian.index', compact('formattedPembelian', 'totalKeseluruhanFormatted'))
        ->with('errorMessage', null);
}



    // Fungsi untuk mengunduh laporan pembelian dalam format PDF
    public function downloadPDF(Request $request)
    {
        // Ambil semua data pembelian
        $pembelian = Pembelian::all(); // Retrieve all Pembelian records
    
        // Format hasil dengan menghitung total harga dan detail stok
        $formattedPembelian = [];
        $groupedPembelianByDate = [];
    
        // Mengelompokkan pembelian berdasarkan tanggal pembelian
        foreach ($pembelian as $item) {
            if ($item->tanggal_pembelian) {
                // Menggunakan Carbon untuk memastikan tanggal dibaca dengan benar
                $tanggalPembelian = \Carbon\Carbon::parse($item->tanggal_pembelian)->format('Y-m-d'); // Format tanggal menjadi 'Y-m-d'
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
                    // Gunakan nilai mentah untuk perhitungan
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
                'tanggal_pembelian' => $tanggal, // Tanggal pembelian
                'stok_detail' => rtrim($stokDetailString, ', '), // Menghilangkan koma terakhir
                'total_harga_pembelian_raw' => $totalPembelian, // Total harga dalam format angka mentah
                'total_harga_pembelian' => number_format($totalPembelian, 0, ',', '.'), // Format total harga pembelian
            ];
        }
    
        // Generate PDF using dompdf
        $pdf = PDF::loadView('laporan_pembelian.pdf', compact('formattedPembelian'));
    
        // Download the PDF file
        return $pdf->download('laporan_pembelian.pdf');
    }
}    
