<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PajakController extends Controller
{
    public function index($tahun)
    {
        $data['tahun'] = $tahun;
        $data['pajak'] = DB::select("SELECT SUM(total_harga) as total ,YEAR(created_at) AS tahun,MONTH(created_at) as bulan FROM penjualan WHERE created_at like '%".$tahun."%' GROUP BY CAST(YEAR(created_at) AS VARCHAR(4)) + '-' + right('00' + CAST(MONTH(created_at) AS VARCHAR(2)), 2)");
        return view('backend.pages.pajak.pajak',$data);
    }
}
