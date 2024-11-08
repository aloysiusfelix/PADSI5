<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    protected $primaryKey = 'id_menu';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'nama_menu',
        'deskripsi_menu',
        'harga_menu',
        'kategori_menu',
        'gambar_menu', // Pastikan gambar_menu ada di sini
    ];    

    // Generate id_menu otomatis dengan UUID sebelum data disimpan
    protected static function booted()
    {
        static::creating(function ($menu) {
            if (empty($menu->id_menu)) {
                $menu->id_menu = (string) Str::uuid();
            }
        });
    }
}
