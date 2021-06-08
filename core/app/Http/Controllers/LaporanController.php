<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Barang_masuk;
use App\Models\Barang_keluar;
use App\Models\History_barang_masuk;
use App\Models\History_barang_keluar;
use App\Exports\OnHandExport;
use App\models\DetailPenjualan;
use App\models\Penjualan;
use Excel;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{

    public function indexPenjualan()
    {
        return view('backend.pages.laporan.laporan_penjualan');
    }

    public function indexPPH()
    {
        return view('backend.pages.laporan.laporan_pph');
    }

    public function cetakPenjualan(Request $request)
    {
        // dd($request->all());
        if($request->tanggal == null){
            return redirect()->back();
        }

        $input = $request->tanggal;
        $pecah = explode(" - ", $input);
        $tanggal_awal = date('Y-m-d H:i:s', strtotime($pecah[0]));
        $tanggal_akhir = date('Y-m-d H:i:s', strtotime($pecah[1]));

        $penjualan = Penjualan::whereBetween('created_at',[$tanggal_awal,$tanggal_akhir])->get();
        $data['penjualan'] = $penjualan;
        $data['periode'] = $request->tanggal;

        if($request->is_detail){
            $detail = DetailPenjualan::where('is_save',1)->get();
            $data['detail'] = $detail;
            return view('backend.pages.laporan.cetak_detail_penjualan',$data);
        }

        
        return view('backend.pages.laporan.cetak_penjualan',$data);
    }

    public function cetakPPH(Request $request)
    {
        // dd($request->all());

        $penjualan = DB::select("SELECT SUM(total_harga) as total ,YEAR(created_at) AS tahun,MONTH(created_at) as bulan FROM penjualan WHERE created_at like '%".$request->tahun."%' GROUP BY CAST(YEAR(created_at) AS VARCHAR(4)) + '-' + right('00' + CAST(MONTH(created_at) AS VARCHAR(2)), 2)");
        $data['penjualan'] = $penjualan;
        $data['tahun'] = $request->tahun;
        // dd($data);
        if($request->is_detail){
            $detail = DetailPenjualan::where('is_save',1)->get();
            $data['detail'] = $detail;
            return view('backend.pages.laporan.cetak_detail_penjualan',$data);
        }

        
        return view('backend.pages.laporan.cetak_pph',$data);
    }

    // public function onhand()
    // {
    //     return view('backend.pages.onhand.index');
    // }

    // public function dataOnhand(Request $request)
    // {
    //     $filter = $request->tahun . '-' . $request->bulan;
    //     if($request->bulan == '01'){
    //         $bulan = '12';
    //     }elseif($request->bulan == '02'){
    //         $bulan = '01';
    //     }elseif($request->bulan == '03'){
    //         $bulan = '02';
    //     }elseif($request->bulan == '04'){
    //         $bulan = '03';
    //     }elseif($request->bulan == '05'){
    //         $bulan = '04';
    //     }elseif($request->bulan == '06'){
    //         $bulan = '05';
    //     }elseif($request->bulan == '07'){
    //         $bulan = '06';
    //     }elseif($request->bulan == '08'){
    //         $bulan = '07';
    //     }elseif($request->bulan == '09'){
    //         $bulan = '08';
    //     }elseif($request->bulan == '10'){
    //         $bulan = '09';
    //     }elseif($request->bulan == '11'){
    //         $bulan = '10';
    //     }elseif($request->bulan == '12'){
    //         $bulan = '11';
    //     }
    //     $filter_prev = $request->tahun . '-' . $bulan;
    //     // dd($filter_prev);
    //     $onhand = Barang::orderBy('kode_barang','ASC')->get();
       
    //     return Datatables::of($onhand)
    //     ->addIndexColumn()
    //     ->addColumn('start_kg', function($onhand) use ($filter,$filter_prev){
    //         $in = Barang_masuk::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter_prev . '%')->sum('kg_in');
    //         $out = Barang_keluar::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter_prev . '%')->sum('kg_in');
    //         $values = $in - $out;
    //         return $values;
    //     })
    //     ->addColumn('in_kg', function($onhand) use ($filter,$filter_prev){
    //         $values = Barang_masuk::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter . '%')->sum('kg_in');
    //         return $values;
    //     })
    //     ->addColumn('out_kg', function($onhand) use ($filter,$filter_prev){
    //         $values = Barang_keluar::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter . '%')->sum('kg_in');
    //         return $values;
    //     })
    //     ->addColumn('ending_kg', function($onhand) use ($filter,$filter_prev){
    //         $in = Barang_masuk::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter_prev . '%')->sum('kg_in');
    //         $out = Barang_keluar::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter_prev . '%')->sum('kg_in');
    //         $start = $in - $out;
    //         $in_now = Barang_masuk::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter . '%')->sum('kg_in');
    //         $out_now = Barang_keluar::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter . '%')->sum('kg_in');
    //         $values = $start + ($in_now-$out_now);
    //         return $values;
    //     })
    //     ->addColumn('ending_rol', function($onhand) use ($filter,$filter_prev){
    //         $in = Barang_masuk::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter_prev . '%')->sum('kg_in');
    //         $out = Barang_keluar::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter_prev . '%')->sum('kg_in');
    //         $start = $in - $out;
    //         $in_now = Barang_masuk::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter . '%')->sum('kg_in');
    //         $out_now = Barang_keluar::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter . '%')->sum('kg_in');
    //         $values = ($start + ($in_now-$out_now))/25;
    //         return ceil($values);
    //     })
    //     ->addColumn('status', function($onhand) use ($filter,$filter_prev){
    //         $in = Barang_masuk::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter_prev . '%')->sum('kg_in');
    //         $out = Barang_keluar::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter_prev . '%')->sum('kg_in');
    //         $start = $in - $out;
    //         $in_now = Barang_masuk::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter . '%')->sum('kg_in');
    //         $out_now = Barang_keluar::where('kode_barang',$onhand->kode_barang)->where('is_save',1)->where('tanggal','like','%' . $filter . '%')->sum('kg_in');
    //         $values = ($start + ($in_now-$out_now))/25;
    //         if($values < $onhand->reorder){
    //             $callback = '<span class="badge badge-warning">Restock</span>';
    //         }else{
    //             $callback = '<span class="badge badge-success">Available</span>';
    //         }
    //         return $callback;
    //     })
    //     ->rawColumns(['status'])
    //     ->addIndexColumn()
    //     ->make(true);
    //     // return response()->json($onhand);
    // }

    // public function excelOnhand(Request $request)
    // {
    //     $filter = $request->tahun_excel . '-' . $request->tanggal_excel;
    //     if($request->tanggal_excel == '01'){
    //         $bulan = '12';
    //     }elseif($request->tanggal_excel == '02'){
    //         $bulan = '01';
    //     }elseif($request->tanggal_excel == '03'){
    //         $bulan = '02';
    //     }elseif($request->tanggal_excel == '04'){
    //         $bulan = '03';
    //     }elseif($request->tanggal_excel == '05'){
    //         $bulan = '04';
    //     }elseif($request->tanggal_excel == '06'){
    //         $bulan = '05';
    //     }elseif($request->tanggal_excel == '07'){
    //         $bulan = '06';
    //     }elseif($request->tanggal_excel == '08'){
    //         $bulan = '07';
    //     }elseif($request->tanggal_excel == '09'){
    //         $bulan = '08';
    //     }elseif($request->tanggal_excel == '10'){
    //         $bulan = '09';
    //     }elseif($request->tanggal_excel == '11'){
    //         $bulan = '10';
    //     }elseif($request->tanggal_excel == '12'){
    //         $bulan = '11';
    //     }
    //     $filter_prev = $request->tahun_excel . '-' . $bulan;
    //     // $barang = Barang::all();
    //     // foreach($barang as $item){
    //     //    $row = [];
    //     //    $row['id'] = $item->id;
    //     //    $row['kode_barang'] = $item->kode_barang;
    //     //    $data[] = $row;
    //     // }
    //     return Excel::download(new OnHandExport($filter,$filter_prev), 'OnHand-' . date('F',strtotime($request->tanggal_excel)) . '.xlsx');
        
    //     // return response()->json($onhand);

       

    // }

    // public function datainHistori(Request $request)
    // {
    //     $filter1 = $request->tahun . '-' . $request->bulan;
    //     $query = History_barang_masuk::where('tanggal_transaksi','like','%' . $filter1 . '%')->orderBy('id','DESC')->get();
    //     return Datatables::of($query)
    //     ->addIndexColumn()
    //     ->addColumn('aksi',function($query){
    //         return '<a target="_blank" href="'.route('print.masuk',$query->kode).'" class="btn btn-warning">Cetak Kontrabon</a>';
    //     })
    //     ->rawColumns(['aksi'])
    //     ->addIndexColumn()
    //     ->make(true);
    // }
    // public function dataoutHistori(Request $request)
    // {
    //     $filter1 = $request->tahun . '-' . $request->bulan;
    //     $query = History_barang_keluar::where('tanggal_transaksi','like','%' . $filter1 . '%')->orderBy('id','DESC')->get();
    //     return Datatables::of($query)
    //     ->addIndexColumn()
    //     ->addColumn('aksi',function($query){
    //         return '<a target="_blank" href="'.route('print.out',$query->kode).'" class="btn btn-warning">Cetak</a>';
    //     })
    //     ->rawColumns(['aksi'])
    //     ->addIndexColumn()
    //     ->make(true);
    // }
}
