<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class History_barang_keluar extends Model
{
    protected $table = 'histori_barang_keluar';
    protected $fillable = [
        'kode',
        'user_id',
        'tanggal_transaksi',
        'pembeli',
    ];
}
