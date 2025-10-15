<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodatas'; // atau nama tabel kamu

    protected $fillable = [
        'nama',
        'tgl_lahir',
        'jk',
        'agama',
        'tinggi_badan',
        'berat_badan',
        'image'
    ];
}
