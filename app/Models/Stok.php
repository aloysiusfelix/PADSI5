<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stok'; // Nama tabel di database
    protected $primaryKey = 'id_stok'; // Primary key untuk model ini
    public $incrementing = false; // Karena id_stok bukan integer auto-increment
    protected $keyType = 'string'; // Tipe data primary key adalah string

    protected $fillable = [
        'nama_stok',
        'deskripsi_stok',
        'jumlah_stok',
        'kategori_stok',
        'gambar_stok',
        'harga_stok',
    ];

    // Generate id_stok otomatis dengan UUID sebelum data disimpan
    protected static function booted()
    {
        static::creating(function ($stok) {
            if (empty($stok->id_stok)) {
                $stok->id_stok = (string) Str::uuid();
            }
        });
    }
}