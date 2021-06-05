<table class="table table-bordered table-sm">
    <thead style="background-color: rgb(196, 195, 195)">
        <tr>
            <th class="text-center" scope="col" width="15px">No.</th>
            <th class="text-center" scope="col">Nama Barang</th>
            <th class="text-center" scope="col">Harga Satuan</th>
            <th class="text-center" scope="col">Qty</th>
            <th class="text-center" scope="col">Total</th>
            <th class="text-center" scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $totals = 0;
        @endphp
        @foreach ($penjualan as $key => $item)
        @php
            $totals += $item->total;
        @endphp
        <tr>
            <td class="text-center">{{ $key+1 }}</td>
            <td class="text-center">{{ $item->barang->kode_barang }} - {{ $item->barang->nama_barang }}</td>
            <td class="text-center">Rp. {{ number_format($item->barang->harga) }}</td>
            <td class="text-center">{{ $item->qty }}</td>
            <td class="text-center">Rp. {{ number_format($item->total) }}</td>
            <td class="text-center">
                <a href="javascript:void(0)" onclick="editBarang(this)" id="{{ $item->id }}"><i class="fa fa-edit"></i></button>
                <a href="javascript:void(0)" onclick="deleteBarang(this)" id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
        <tr>
            <td  colspan="4"><b> Total </b></td>
            <td class="text-center" colspan="2"><b> Rp. {{ number_format($totals) }} </b></td>
        </tr>
    </tbody>
</table>