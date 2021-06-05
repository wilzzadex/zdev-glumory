<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History_barang_masuk extends Model
{
    protected $table = 'histori_barang_masuk';
    protected $fillable = [
        'kode',
        'user_id',
        'tanggal_transaksi',
        'suplier',
    ];
}
