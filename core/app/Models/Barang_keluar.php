<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Barang_keluar extends Model
{
    protected $table = 'barang_keluar';
    protected $fillable = [
        'kode_barang_keluar',
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
