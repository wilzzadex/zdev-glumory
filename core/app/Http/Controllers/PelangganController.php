<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\models\Penjualan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $data['pelanggan'] = Pelanggan::orderBy('nama', 'asc')->get();
        return view('backend.pages.pelanggan.pelanggan', $data);
    }

    public function add()
    {
        return view('backend.pages.pelanggan.add_pelanggan');
    }

    public function store(Request $request)
    {
        $pelanggan = new Pelanggan();
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->save();

        return redirect(route('pelanggan'))->with('success', 'Data Pelanggan berhasil di simpan');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $data['pelanggan'] = $pelanggan;
        return view('backend.pages.pelanggan.edit_pelanggan', $data);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->save();

        return redirect()->back()->with('success','Data Pelanggan berhasil di ubah');
    }

    public function destroy(Request $request)
    {
        $pelanggan = Pelanggan::where('id',$request->id)->first();
        $cek = Penjualan::where('pelanggan_id',$pelanggan->id)->count();
        if($cek == 0){
            $pelanggan->delete();
            return response()->json('oke');
        }else{
            return response()->json('no');
        }
    }
}
