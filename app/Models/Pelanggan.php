<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';
    public $fillable = ['nama', 'alamat', 'no_hp'];
    public $visible = ['id', 'nama', 'alamat', 'no_hp'];
}
