<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    // Jika nama tabel tidak sesuai dengan nama model, spesifikasikan nama tabel secara eksplisit
    protected $table = 'transaksi_penjualan';

    // Tentukan primary key jika bukan 'id'
    protected $primaryKey = 'id_penjualan';
    public $incrementing = false; // Jika primary key bukan integer auto-increment
    protected $keyType = 'string'; // Tipe data primary key

    // Mass-assignable attributes
    protected $fillable = [
        'id_penjualan',
        'tanggal_penjualan',
        'id_menu',
        'nama_menu',
        'jumlah_menu',
        'harga_menu',
        'total_penjualan',
        'id_pelanggan',
        'nama_pelanggan',
    ];

    // Relasi ke tabel 'pelanggan'
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    // Relasi ke tabel 'menu'
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }
}