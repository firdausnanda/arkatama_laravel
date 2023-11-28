<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = [
        'id_user',
        'id_produk',
        'tgl_transaksi',
    ];

    function user() 
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    function produk() 
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
