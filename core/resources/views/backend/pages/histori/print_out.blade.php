<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <style>
        table, td, th {
          border: 1px solid black;
        }
        
        table {
          width: 100%;
          border-collapse: collapse;
        }
        </style>
</head>
<body onload="window.print()">
    <table class="table table-bordered" id="preview-table-head">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Roll</th>
                <th>Jumlah (Kg)</th>
                {{-- <th>Dpp (Rp)</th>
                <th>Ppn (10%)</th> --}}
                <th>Total (Rp)</th>
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
            @foreach ($detail_barang as $key => $item)
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
                {{-- <td>{{ number_format($ppn,2,',','.') }}</td>
                <td>{{ number_format($item->harga_in + $ppn,2,',','.') }}</td> --}}
            </tr>
            @endforeach
            <tr>
                <th colspan="3">Jumlah</th>
                <th>{{ ceil($jumlah_rol) }}</th>
                <th>{{ $jumlah_kg }}</th>
                <th>{{ number_format($total_harga,2,',','.') }}</th>
                {{-- <th>{{ number_format($total_harga_ppn,2,',','.') }}</th>
                <th>{{ number_format($total_total,2,',','.') }}</th> --}}
               
            </tr>
        </tbody>
    </table>
</body>
<br>
</html>