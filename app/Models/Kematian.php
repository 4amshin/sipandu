<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'no_kk',
        'nama',
        'jenis_kelamin',
        'tanggal_kematian',
        'jam_kematian',
        'tempat_kematian',
        'sebab',
        'nama_ayah',
        'nama_ibu',
    ];
}
//no_kk,
