<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'ticket';

    protected $fillable = [
        'idPelanggan', 'pesanan', 'status', 'total', 'nomorMeja', 'tanggal', 'payment'
    ];
}