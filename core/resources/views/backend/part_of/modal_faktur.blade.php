<div class="modal-dialog modal-lg">
    <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title">No Faktur | {{ $penjualan->kode_transaksi }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table border="0" style="width: 100%">
                <tr>
                    <td style="max-width: 50px">No Faktur</td>
                    <td>:</td>
                    <td>{{ $penjualan->kode_transaksi }}</td>
                    <td style="max-width: 60px" class="text-right">Tanggal :
                        {{ date('d M Y H:i', strtotime($penjualan->created_at)) }}</td>
                </tr>
                <tr>
                    <td style="max-width: 30px">Nama Pelanggan</td>
                    <td>:</td>
                    <td>{{ $penjualan->pelanggan->nama }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="max-width: 30px">Alamat</td>
                    <td>:</td>
                    <td>{{ $penjualan->pelanggan->alamat }}</td>
                    <td></td>
                </tr>
            </table>

            <br>

            <table class="table table-bordered table-sm">
                <thead style="background-color: rgb(196, 195, 195)">
                    <tr>
                        <th class="text-center" scope="col" width="15px">No.</th>
                        <th class="text-center" scope="col">Nama Barang</th>
                        <th class="text-center" scope="col">Harga Satuan</th>
                        <th class="text-center" scope="col">Qty</th>
                        <th class="text-center" scope="col">Total</th>
                        {{-- <th class="text-center" scope="col">Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totals = 0;
                    @endphp
                    @foreach ($detail as $key => $item)
                        @php
                            $totals += $item->total;
                        @endphp
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $item->barang->kode_barang }} -
                                {{ $item->barang->nama_barang }}</td>
                            <td class="text-center">Rp. {{ number_format($item->barang->harga) }}</td>
                            <td class="text-center">{{ $item->qty }}</td>
                            <td class="text-center">Rp. {{ number_format($item->total) }}</td>
                            {{-- <td class="text-center">
                                <a href="javascript:void(0)" onclick="editBarang(this)" id="{{ $item->id }}"><i
                                        class="fa fa-edit"></i></button>
                                    <a href="javascript:void(0)" onclick="deleteBarang(this)"
                                        id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                            </td> --}}
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4"><b> Total </b></td>
                        <td class="text-center" colspan="2"><b> Rp. {{ number_format($totals) }} </b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <a href="{{ route('penjualan.cetak.faktur',$penjualan->kode_transaksi) }}" target="_blank" class="btn btn-primary">Cetak</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>
