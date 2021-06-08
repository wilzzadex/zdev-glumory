<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $data['penjualan'] = Penjualan::orderBy('created_at', 'desc')->get();
        return view('backend.pages.penjualan.penjualan', $data);
    }

    public function add()
    {
        $last_ids = Penjualan::orderBy('id', 'desc')->count();
        $last_id = Penjualan::orderBy('id', 'desc')->first();
        $kode = ($last_ids != 0) ? $last_id->id + 1 : 1;
        $pelanggan = Pelanggan::orderBy('nama', 'asc')->get();
        $barang = Barang::orderBy('nama_barang', 'asc')->get();

        $data['pelanggan'] = $pelanggan;
        $data['kode'] = date('Ymdhi') . $kode;
        $data['barang'] = $barang;
        return view('backend.pages.penjualan.add_penjualan', $data);
    }

    public function renderTabel()
    {
        $detail_penjualan = DetailPenjualan::where('user_id', auth()->user()->id)->where('is_save', 0)->get();
        $data['penjualan'] = $detail_penjualan;
        return view('backend.part_of.tabel_daftar_barang', $data);
    }

    public function jmlBarangTemp()
    {
        $detail_penjualan = DetailPenjualan::where('user_id', auth()->user()->id)->where('is_save', 0)->count();
        return response()->json($detail_penjualan);
    }

    public function addToTemp(Request $request)
    {
        $cek = DetailPenjualan::where('is_save', 0)->where('user_id', auth()->user()->id)->where('barang_id', $request->barang_id)->count();
        if ($cek == 0) {
            $barang = Barang::where('id', $request->barang_id)->first();
            $temp = new DetailPenjualan();
            $temp->kode_transaksi = $request->kode_transaksi;
            $temp->barang_id = $request->barang_id;
            $temp->qty = $request->qty;
            $temp->total = $request->qty * $barang->harga;
            $temp->is_save = 0;
            $temp->user_id = auth()->user()->id;
            $temp->save();
            return response()->json('tdak');
        } else {
            return response()->json('ada');
        }
    }

    public function deleteTemp(Request $request)
    {
        $barang = DetailPenjualan::where('id', $request->id)->delete();
    }

    public function store(Request $request)
    {
        $total = DetailPenjualan::where('user_id', auth()->user()->id)->where('is_save', 0)->sum('total');
        $penjualan = new Penjualan();
        $penjualan->kode_transaksi = $request->kode_transaksi;
        $penjualan->pelanggan_id = $request->pelanggan_id;
        $penjualan->total_harga = $total;
        $penjualan->user_id = auth()->user()->id;
        $penjualan->save();

        $detail = DetailPenjualan::where('kode_transaksi', $penjualan->kode_transaksi)->update(['is_save' => 1]);

        return redirect(route('penjualan'))->with('success','Penjualan berhasil di proses ');
    }

    public function editTemp(Request $request)
    {
        $temp = DetailPenjualan::where('id', $request->id)->first();
        $barang = Barang::orderBy('nama_barang', 'asc')->get();
        $data['temp'] = $temp;
        $data['barang'] = $barang;
        return view('backend.part_of.modal_edit_temp', $data);
    }

    public function updateTemp(Request $request)
    {
        $cek = DetailPenjualan::where('id', '!=', $request->id)->where('is_save', 0)->where('user_id', auth()->user()->id)->where('barang_id', $request->barang_id_edit)->count();
        // dd($cek);
        if ($cek == 0) {
            $barang = Barang::where('id', $request->barang_id_edit)->first();
            $temp = DetailPenjualan::where('id', $request->id)->first();
            $temp->barang_id = $request->barang_id_edit;
            $temp->qty = $request->qty_edit;
            $temp->total = $request->qty_edit * $barang->harga;
            $temp->save();
            return response()->json('tdak');
        } else {
            return response()->json('ada');
        }
    }

    public function lihatFaktur(Request $request)
    {
        $penjualan = Penjualan::where('kode_transaksi',$request->kode_transaksi)->first();
        $detail = DetailPenjualan::where('kode_transaksi',$request->kode_transaksi)->where('is_save',1)->get();
        $data['penjualan'] = $penjualan;
        $data['detail'] = $detail;
        return view('backend.part_of.modal_faktur',$data);
    }

    public function cetakFaktur($kode)
    {
        $data['penjualan'] = Penjualan::where('kode_transaksi',$kode)->first();
        $data['detail'] = DetailPenjualan::where('is_save',1)->where('kode_transaksi',$kode)->get();
        return view('backend.pages.penjualan.cetak_faktur',$data);
    }

    public function destroy(Request $request)
    {
        $penjualan = Penjualan::where('id',$request->id)->first();
        $detail = DetailPenjualan::where('kode_transaksi',$penjualan->kode_transaksi)->where('is_save',1)->delete();
        $penjualan->delete();
    }
}
