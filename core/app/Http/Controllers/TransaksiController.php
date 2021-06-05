<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Barang_masuk;
use App\Models\Barang_keluar;
use App\Models\History_barang_masuk;
use App\Models\History_barang_keluar;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function indexIn()
    {
        return view('backend.pages.transaksi.in.in');
    }

    public function indexOut()
    {
        return view('backend.pages.transaksi.out.out');
    }

    public function addIn()
    {
        $barang = Barang::orderBy('kode_barang','ASC')->get();
        $data_barang = Barang_masuk::where('created_by',auth()->user()->id)->where('is_save',0)->orderBy('id','ASC')->get();
        $data['barang_masuk'] = $data_barang;
        $data['barang'] = $barang;
        return view('backend.pages.transaksi.in.add',$data);
    }

    public function addOut()
    {
        $barang = Barang::orderBy('kode_barang','ASC')->get();
        $data_barang = Barang_keluar::where('created_by',auth()->user()->id)->where('is_save',0)->orderBy('id','ASC')->get();
        $data['barang_masuk'] = $data_barang;
        $data['barang'] = $barang;
        return view('backend.pages.transaksi.out.add',$data);
    }

    public function store_in_temp(Request $request)
    {
        // dd($request->all());
        $input1 = str_replace('Rp','',$request->harga);
        $input2 = str_replace('.','',$input1);
        $harga = str_replace(' ','',$input2);

        $cek = Barang_masuk::where(['created_by' => auth()->user()->id, 'kode_barang' => $request->kode_barang, 'is_save' => 0])->count();
        if($cek > 0){
            return response()->json('ada');
        }else{
            $barang_masuk = new Barang_masuk();
            $barang_masuk->kode_barang_masuk = null;
            $barang_masuk->kode_barang = $request->kode_barang;
            $barang_masuk->kg_in = $request->jumlah;
            $barang_masuk->harga_in = $harga;
            $barang_masuk->is_save = 0;
            $barang_masuk->created_by = auth()->user()->id;
            $barang_masuk->tanggal = date('Y-m-d');
            $barang_masuk->save();

            $data_barang = Barang_masuk::where('created_by',auth()->user()->id)->where('is_save',0)->orderBy('id','ASC')->get();
            $data['barang'] = $data_barang;
            return view('backend.pages.transaksi.in.part_table_preview',$data);
        }
       
        
    }

    public function store_out_temp(Request $request)
    {
        $get_stok_masuk = Barang_masuk::where('kode_barang',$request->kode_barang)->where('is_save',1)->sum('kg_in');
        $get_stok_keluar = Barang_keluar::where('kode_barang',$request->kode_barang)->where('is_save',1)->sum('kg_in');
        $stok = $get_stok_masuk - $get_stok_keluar;
        
        $input1 = str_replace('Rp','',$request->harga);
        $input2 = str_replace('.','',$input1);
        $harga = str_replace(' ','',$input2);

        $cek = Barang_keluar::where(['created_by' => auth()->user()->id, 'kode_barang' => $request->kode_barang, 'is_save' => 0])->count();
        if($cek > 0){
            return response()->json('ada');
        }else{
            if($stok < $request->jumlah){
                return response()->json('no');
            }else{
                $barang_masuk = new Barang_keluar();
                $barang_masuk->kode_barang_keluar = null;
                $barang_masuk->kode_barang = $request->kode_barang;
                $barang_masuk->kg_in = $request->jumlah;
                $barang_masuk->harga_in = $harga;
                $barang_masuk->is_save = 0;
                $barang_masuk->created_by = auth()->user()->id;
                $barang_masuk->tanggal = date('Y-m-d');
                $barang_masuk->save();
            }
            $data_barang = Barang_keluar::where('created_by',auth()->user()->id)->where('is_save',0)->orderBy('id','ASC')->get();
            $data['barang'] = $data_barang;
            return view('backend.pages.transaksi.out.part_table_preview',$data);
        }
       
        
    }

    public function inDestroy(Request $request)
    {
        $hapus = Barang_masuk::findOrFail($request->id)->delete();
        $data_barang = Barang_masuk::where('created_by',auth()->user()->id)->where('is_save',0)->orderBy('id','ASC')->get();
        $data['barang'] = $data_barang;
        return view('backend.pages.transaksi.in.part_table_preview',$data);
    }

    public function outDestroy(Request $request)
    {
        $hapus = Barang_keluar::findOrFail($request->id)->delete();
        $data_barang = Barang_keluar::where('created_by',auth()->user()->id)->where('is_save',0)->orderBy('id','ASC')->get();
        $data['barang'] = $data_barang;
        return view('backend.pages.transaksi.out.part_table_preview',$data);
    }

    public function inEdit(Request $request)
    {
        $barang_masuk = Barang_masuk::findOrFail($request->id);
        return response()->json($barang_masuk);
    }

    public function outEdit(Request $request)
    {
        $barang_masuk = Barang_keluar::findOrFail($request->id);
        return response()->json($barang_masuk);
    }

    public function outUpdate(Request $request)
    {
        $get_stok_masuk = Barang_masuk::where('kode_barang',$request->kode_barang)->where('is_save',1)->sum('kg_in');
        $get_stok_keluar = Barang_keluar::where('kode_barang',$request->kode_barang)->where('is_save',1)->sum('kg_in');
        $stok = $get_stok_masuk - $get_stok_keluar;

        $input1 = str_replace('Rp','',$request->harga);
        $input2 = str_replace('.','',$input1);
        $harga = str_replace(' ','',$input2);
        
        $cek = Barang_keluar::where(['created_by' => auth()->user()->id, 'kode_barang' => $request->kode_barang, 'is_save' => 0])->where('id','!=',$request->id)->count();
        if($cek > 0){
            return response()->json('ada');
        }else{
            if($stok < $request->jumlah){
                return response()->json('no');
            }else{
                $barang_masuk = Barang_keluar::find($request->id);
                $barang_masuk->kode_barang_keluar = null;
                $barang_masuk->kode_barang = $request->kode_barang;
                $barang_masuk->kg_in = $request->jumlah;
                $barang_masuk->harga_in = $harga;
                $barang_masuk->is_save = 0;
                $barang_masuk->created_by = auth()->user()->id;
                $barang_masuk->save();
            }

            $data_barang = Barang_keluar::where('created_by',auth()->user()->id)->where('is_save',0)->orderBy('id','ASC')->get();
            $data['barang'] = $data_barang;
            return view('backend.pages.transaksi.out.part_table_preview',$data);
        }
        // dd($cek);
    }

    public function inUpdate(Request $request)
    {
        $input1 = str_replace('Rp','',$request->harga);
        $input2 = str_replace('.','',$input1);
        $harga = str_replace(' ','',$input2);
        
        $cek = Barang_masuk::where(['created_by' => auth()->user()->id, 'kode_barang' => $request->kode_barang, 'is_save' => 0])->where('id','!=',$request->id)->count();
        if($cek > 0){
            return response()->json('ada');
        }else{
            $barang_masuk = Barang_masuk::find($request->id);
            $barang_masuk->kode_barang_masuk = null;
            $barang_masuk->kode_barang = $request->kode_barang;
            $barang_masuk->kg_in = $request->jumlah;
            $barang_masuk->harga_in = $harga;
            $barang_masuk->is_save = 0;
            $barang_masuk->created_by = auth()->user()->id;
            $barang_masuk->save();

            $data_barang = Barang_masuk::where('created_by',auth()->user()->id)->where('is_save',0)->orderBy('id','ASC')->get();
            $data['barang'] = $data_barang;
            return view('backend.pages.transaksi.in.part_table_preview',$data);
        }
        // dd($cek);
    }

    public function inStoreAll(Request $request)
    {
        // dd($request->all());
        $kode = 'IN-' . str_random(5);
        $histori = new History_barang_masuk();
        $histori->kode = $kode;
        $histori->user_id = auth()->user()->id;
        $histori->suplier = $request->suplier;
        $histori->tanggal_transaksi = date('Y-m-d');
        $histori->save();

        $item = Barang_masuk::where('created_by',auth()->user()->id)->where('is_save',0)->update([
            'is_save' => 1,
            'kode_barang_masuk' => $kode,
        ]);
        return redirect(route('in'))->with('msg','Data Berhasil Disimpan');
    }

    public function OutStoreAll(Request $request)
    {
        $kode = 'TRN-' . str_random(5);
        $histori = new History_barang_keluar();
        $histori->kode = $kode;
        $histori->pembeli = $request->suplier;
        $histori->user_id = auth()->user()->id;
        $histori->tanggal_transaksi = date('Y-m-d');
        $histori->save();

        $item = Barang_keluar::where('created_by',auth()->user()->id)->where('is_save',0)->update([
            'is_save' => 1,
            'kode_barang_keluar' => $kode,
        ]);
        return redirect(route('out'))->with('msg','Data Berhasil Disimpan');
    }

    public function dataBarangMasuk(Request $request)
    {
        $filter1 = $request->tahun . '-' . $request->bulan;
        $query = Barang_masuk::where('tanggal','like','%' . $filter1 . '%')->orderBy('id','DESC')->get();
        // dd($request->all());
        return Datatables::of($query)
        ->addIndexColumn()
        ->addColumn('nama_barang', function($query){
            return $query->barang->nama_barang;
        })
        ->addColumn('roll', function($query){
            $roll = $query->kg_in/25;
            return ceil($roll);
        })
        ->addColumn('ppn', function($query){
            $ppn = $query->harga_in * (10/100);
            return  number_format($ppn,2,',','.');
        })
        ->addColumn('total', function($query){
            $ppn = $query->harga_in * (10/100);
            return  number_format($query->harga_in+$ppn,2,',','.');
        })
        ->editColumn('harga_in', function($query){
            return number_format($query->harga_in,2,',','.');
        })
        ->editColumn('tanggal', function($query){
            return date('d F Y',strtotime($query->tanggal));
        })
        ->addIndexColumn()
        ->make(true);
    }

    public function dataBarangKeluar(Request $request)
    {
        $filter1 = $request->tahun . '-' . $request->bulan;
        $query = Barang_keluar::where('tanggal','like','%' . $filter1 . '%')->orderBy('id','DESC')->get();
        // dd($request->all());
        return Datatables::of($query)
        ->addIndexColumn()
        ->addColumn('nama_barang', function($query){
            return $query->barang->nama_barang;
        })
        ->addColumn('roll', function($query){
            $roll = $query->kg_in/25;
            return ceil($roll);
        })
        ->editColumn('harga_in', function($query){
            return number_format($query->harga_in,2,',','.');
        })
        ->editColumn('tanggal', function($query){
            return date('d F Y',strtotime($query->tanggal));
        })
        ->addIndexColumn()
        ->make(true);
    }

    public function inHistori()
    {
        $detail_barang = Barang_masuk::all();
        $data['detail_barang'] = $detail_barang;
        return view('backend.pages.histori.in',$data);
    }
    public function outHistori()
    {
        return view('backend.pages.histori.out');
    }

    public function printIn($kode)
    {
        $detail_barang = Barang_masuk::where('kode_barang_masuk',$kode)->get();
        $data['detail_barang'] = $detail_barang;
        // dd($data);
        return view('backend.pages.histori.print_in',$data);
    }
    public function printOut($kode)
    {
        $detail_barang = Barang_keluar::where('kode_barang_keluar',$kode)->get();
        $data['detail_barang'] = $detail_barang;
        // dd($data);
        return view('backend.pages.histori.print_out',$data);
    }

}
