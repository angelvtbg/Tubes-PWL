<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservation';

    protected $fillable = [
        'idPelanggan', 'status', 'tanggal', 'jamMasuk', 'jamKeluar', 'idMeja', 'biaya', 'atasNama', 'email', 'telepon'
    ];
}
