<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';

    public function pelanggan()
    {
        return $this->hasOne('App\Models\Pelanggan','id','pelanggan_id');
    }
}
