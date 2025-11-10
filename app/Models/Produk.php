<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
class Produk extends Model
{
   

    protected $fillable = ['nama_produk', 'stok', 'harga'];
    protected $visible = ['nama_produk', 'stok', 'harga'];

    public function transaksis()
    {
        // membuat relasi many to many ke Transaksi melalui table detail_transaksi
        // yang diwakili oleh id_produk dan id_transaksi
        // dan bisa melampirkan jumlah, sub total & tanggal created_at update
        return this->belongsToMany(Transaksi::class, 'detail_transaksi');
    }
}
