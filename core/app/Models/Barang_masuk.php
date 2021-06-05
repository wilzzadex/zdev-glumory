<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang_masuk extends Model
{
    protected $table = 'barang_masuk';
    protected $fillable = [
        'kode_barang_masuk',
        'kode_barang',
        'kg_in',
        'harga_in',
        'is_save',
        'created_by',
    ];

    function barang(){
        return $this->hasOne('App\Models\Barang','kode_barang','kode_barang');
    }
}
