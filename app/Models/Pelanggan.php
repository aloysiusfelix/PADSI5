<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan'; // Nama tabel di database
    protected $primaryKey = 'id_pelanggan'; // Primary key untuk model ini
    public $incrementing = false; // Karena id_pelanggan bukan integer auto-increment
    protected $keyType = 'string'; // Tipe data primary key adalah string

    protected $fillable = [
        'nama_pelanggan',
        'no_hp_pelanggan',
        'email_pelanggan',
        'poin_pelanggan',
    ];

    // Generate id_pelanggan otomatis dengan UUID sebelum data disimpan
    protected static function booted()
    {
        static::creating(function ($pelanggan) {
            if (empty($pelanggan->id_pelanggan)) {
                $pelanggan->id_pelanggan = (string) Str::uuid();
            }
        });
    }
}