<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    // If the table name doesn't follow Laravel's naming convention, specify it explicitly
    protected $table = 'transaksi_pembelian';

    // Define the primary key if it's not 'id'
    protected $primaryKey = 'id_pembelian';
    public $incrementing = false; // If the primary key is not an auto-incrementing integer
    protected $keyType = 'string'; // Primary key data type

    // Mass-assignable attributes
    protected $fillable = [
        'id_pembelian',
        'tanggal_pembelian',
        'id_stok',
        'nama_stok',
        'jumlah_item_pembelian',
        'total_harga_pembelian',
    ];

    // Relation to the 'stok' table
    public function stok()
    {
        return $this->belongsTo(Stok::class, 'id_stok', 'id_stok');
    }
}
