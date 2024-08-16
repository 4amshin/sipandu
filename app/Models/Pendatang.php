<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendatang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'no_kk',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status_pernikahan',
        'pendidikan',
        'pekerjaan',
        'rt',
        'rw',
        'dusun',
        'nama_ayah',
        'nama_ibu',
        'tanggal_datang',
        'nama_pelapor',
    ];
}
/*harus sama dengan model penduduk
karena data nya akan otomatis ke data penduduk
*/
