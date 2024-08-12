<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendatang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tanggal_datang',
        'nama_pelapor',
    ];
}
