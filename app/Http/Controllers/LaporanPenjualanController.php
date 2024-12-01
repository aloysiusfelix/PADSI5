<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF; // Import facade PDF

class LaporanPenjualanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil input tanggal awal dan tanggal akhir dari request
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        // Periksa apakah tanggal awal dan akhir telah diisi
        if ($tanggalAwal && $tanggalAkhir) {
            // Convert tanggal input ke format Y-m-d (menggunakan Carbon)
            $tanggalAwal = \Carbon\Carbon::parse($tanggalAwal)->startOfDay();
            $tanggalAkhir = \Carbon\Carbon::parse($tanggalAkhir)->endOfDay();

            // Query untuk mengambil data antara tanggal awal dan akhir
            $penjualan = Penjualan::whereBetween('tanggal_penjualan', [$tanggalAwal, $tanggalAkhir])->get();
        } else {
            // Jika tidak ada filter tanggal, ambil semua data penjualan
            $penjualan = Penjualan::all();
        }

        // Format data untuk ditampilkan
        $penjualanGrouped = [];

        foreach ($penjualan as $item) {
            $key = $item->nama_pelanggan . '-' . $item->tanggal_penjualan;
            if (!isset($penjualanGrouped[$key])) {
                $penjualanGrouped[$key] = [
                    'id_penjualan' => $item->id_penjualan, 
                    'tanggal_penjualan' => \Carbon\Carbon::parse($item->tanggal_penjualan)->format('Y-m-d'),
                    'menu_detail' => [],
                    'total_penjualan' => 0,
                    'nama_pelanggan' => $item->nama_pelanggan,
                ];
            }

            $penjualanGrouped[$key]['total_penjualan'] += $item->total_penjualan;
            if (isset($penjualanGrouped[$key]['menu_detail'][$item->nama_menu])) {
                $penjualanGrouped[$key]['menu_detail'][$item->nama_menu] += $item->jumlah_menu;
            } else {
                $penjualanGrouped[$key]['menu_detail'][$item->nama_menu] = $item->jumlah_menu;
            }
        }

        // Format hasil
        $formattedPenjualan = [];
        $totalPenjualan = 0; // Variabel untuk menghitung total keseluruhan

        foreach ($penjualanGrouped as $group) {
            $menuDetailString = '';
            foreach ($group['menu_detail'] as $menu => $jumlah) {
                $menuDetailString .= "{$menu} {$jumlah}, ";
            }

            $formattedPenjualan[] = [
                'id_penjualan' => $group['id_penjualan'],
                'tanggal_penjualan' => $group['tanggal_penjualan'],
                'menu_detail' => rtrim($menuDetailString, ', '),
                'total_penjualan' => number_format($group['total_penjualan'], 0, ',', '.'),
                'nama_pelanggan' => $group['nama_pelanggan'],
            ];

            // Tambahkan total penjualan ke total keseluruhan
            $totalPenjualan += $group['total_penjualan'];
        }

        // Format total penjualan
        $totalPenjualanFormatted = number_format($totalPenjualan, 0, ',', '.');

        return view('laporan_penjualan.index', compact('formattedPenjualan', 'totalPenjualanFormatted'));
    }


    // Fungsi untuk mengunduh laporan dalam format PDF
    public function downloadPDF(Request $request)
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
            $penjualan = Penjualan::whereBetween('tanggal_penjualan', [$tanggalAwal, $tanggalAkhir])->get();
        } else {
            // Jika tidak ada filter tanggal, ambil semua data penjualan
            $penjualan = Penjualan::all();
        }

        // Format data untuk ditampilkan
        $penjualanGrouped = [];

        foreach ($penjualan as $item) {
            $key = $item->nama_pelanggan . '-' . $item->tanggal_penjualan;
            if (!isset($penjualanGrouped[$key])) {
                $penjualanGrouped[$key] = [
                    'id_penjualan' => 'P' . strtoupper(Str::random(6)),
                    'tanggal_penjualan' => Carbon::parse($item->tanggal_penjualan)->format('Y-m-d'),
                    'menu_detail' => [],
                    'total_penjualan' => 0,
                    'nama_pelanggan' => $item->nama_pelanggan,
                ];
            }

            $penjualanGrouped[$key]['total_penjualan'] += $item->total_penjualan;
            if (isset($penjualanGrouped[$key]['menu_detail'][$item->nama_menu])) {
                $penjualanGrouped[$key]['menu_detail'][$item->nama_menu] += $item->jumlah_menu;
            } else {
                $penjualanGrouped[$key]['menu_detail'][$item->nama_menu] = $item->jumlah_menu;
            }
        }

        // Format hasil
        $formattedPenjualan = [];
        foreach ($penjualanGrouped as $group) {
            $menuDetailString = '';
            foreach ($group['menu_detail'] as $menu => $jumlah) {
                $menuDetailString .= "{$menu} {$jumlah}, ";
            }

            $formattedPenjualan[] = [
                'id_penjualan' => $group['id_penjualan'],
                'tanggal_penjualan' => $group['tanggal_penjualan'],
                'menu_detail' => rtrim($menuDetailString, ', '),
                'total_penjualan' => $group['total_penjualan'], 
                'nama_pelanggan' => $group['nama_pelanggan'],
            ];
        }

        // Generate PDF using dompdf
        $pdf = PDF::loadView('laporan_penjualan.pdf', compact('formattedPenjualan'));

        // Download the PDF file
        return $pdf->download('laporan_penjualan.pdf');
    }
}
