<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $data['barang'] = Barang::orderBy('id','ASC')->get();
        return view('backend.pages.list_barang.barang',$data);
    }

    public function add()
    {
        return view('backend.pages.list_barang.add_barang');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'kode_barang' => 'unique:barang,kode_barang',
            'nama_barang' => 'required',
        ]);
        $barang = new Barang();
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = str_replace(".","",$request->harga);
        $barang->save();

        return redirect(route('barang'))->with('success','Data barang berhasil di simpan !');
        
    }

    public function destroy(Request $request)
    {
        $barang = Barang::find($request->id);
        $cek = DetailPenjualan::where('barang_id',$barang->id)->count();
        if($cek == 0){
            $barang->delete();
            return response()->json('oke');
        }else{
            return response()->json('no');
        }
    }

    public function edit($id)
    { 
        $barang = Barang::find($id);
        $data['barang'] = $barang;
        return view('backend.pages.list_barang.edit_barang',$data);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'kode_barang' => 'unique:barang,kode_barang,'.$id,
            'nama_barang' => 'required',
        ]);
        $barang = Barang::find($id);
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->reorder = $request->reorder;
        $barang->save();

        return redirect(route('barang'))->with('success','Data barang berhasil di ubah !');
    }
}
