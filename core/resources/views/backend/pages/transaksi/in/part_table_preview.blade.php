<table class="table table-bordered" id="preview-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Roll</th>
            <th>Jumlah (Kg)</th>
            <th>Dpp (Rp)</th>
            <th>Ppn (10%)</th>
            <th>Total (Rp)</th>
            <th id="th-aksi">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $jumlah_rol = 0;
            $jumlah_kg = 0;
            $total_harga = 0;
            $total_harga_ppn = 0;
            $total_total = 0;
        @endphp
        @foreach ($barang as $key => $item)
        @php
            $ppn = $item->harga_in * (10/100);
            $jumlah_rol += ($item->kg_in/25);
            $jumlah_kg += $item->kg_in;
            $total_harga += $item->harga_in;
            $total_harga_ppn += $ppn;
            $total_total += ($item->harga_in + $ppn);
        @endphp
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $item->kode_barang }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ ceil($item->kg_in/25) }}</td>
            <td>{{ $item->kg_in }}</td>
            <td>{{ number_format($item->harga_in,2,',','.') }}</td>
            <td>{{ number_format($ppn,2,',','.') }}</td>
            <td>{{ number_format($item->harga_in + $ppn,2,',','.') }}</td>
            <td id="td-aksi">
                {{-- <input type="text" id="input_suplier"> --}}
                <button type="button" id="{{ $item->id }}" onclick="hapus(this)" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                <button type="button" id="{{ $item->id }}" onclick="edit(this)" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
            </td>
        </tr>
        @endforeach
        <tr>
            <th colspan="3">Jumlah</th>
            <th>{{ ceil($jumlah_rol) }}</th>
            <th>{{ $jumlah_kg }}</th>
            <th>{{ number_format($total_harga,2,',','.') }}</th>
            <th>{{ number_format($total_harga_ppn,2,',','.') }}</th>
            <th>{{ number_format($total_total,2,',','.') }}</th>
            <th id="tf-aksi">
                @if (count($barang) > 0)
                <button onclick="print()" type="button" id="btn-print" class="btn btn-primary">Cetak</button>
                <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-success">Simpan</button>
                @endif
            </th>
        </tr>
    </tbody>
</table>