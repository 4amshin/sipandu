<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'nomor_telepon',
        'role',
        'gambar_profile',
        'email',
        'password',
    ];
}
