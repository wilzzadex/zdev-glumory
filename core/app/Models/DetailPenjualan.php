<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $table = 'detail_penjualan';

    public function barang()
    {
        return $this->hasOne('App\Models\Barang','id','barang_id');
    }
}
