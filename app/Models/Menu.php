<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $primaryKey = 'id_menu';

    protected $fillable = [
        'penulis',
        'id_kategori',
        'nama_menu',
        'harga_menu',
        'gambar_menu',
        'berita_menu',
        'tanggal_menu',
        'dilihat',
    ];
}
