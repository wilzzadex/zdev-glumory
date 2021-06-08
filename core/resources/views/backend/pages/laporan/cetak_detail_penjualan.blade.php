<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @media print {
            @page {
                size: auto;
                margin-top: 0;
                margin-bottom: 0px;
            }

            #data,
            #data th,
            #data td {
                border: 1px solid;
            }

            #data td,
            #data th {
                padding: 5px;
            }

            #data {
                border-spacing: 0px;
                margin-top: 40px;
                font-size: 17px;
            }

            #childTable {
                border: none;
            }

            body {
                padding-top: 10px;
                font-family: sans-serif;
            }
        }

    </style>
</head>

<body onload="window.print()">
    <table border="0" style="width: 100%;margin-top:20px">
        <tr>
            <td style="width: 70%">
                <h5><b>Hafara Cantik Indonesia</b></h5>
            </td>
            <td rowspan="2" class="text-right"><img width="25%" src="{{ url('assets/glu.png') }}" alt=""></td>
        </tr>
        <tr>
            <td><span>Ciganitri No.18 Ruko Garden City, Kec.Bojongsoang, Bandung</span></td>
        </tr>
    </table>
    <hr>
    <center>
        <h5><b> Laporan Data Penjualan Tanggal {{ $periode }}</h5> </b>
    </center>
    <table id="data" style="width:100%">
        <tr>
            <th class="text-center">NO.</th>
            <th class="text-center">NO FAKTUR</th>
            <th class="text-center">TANGGAL TRANSAKSI</th>
            <th class="text-center">PELANGGAN</th>
            <th class="text-center">TOTAL</th>
        </tr>
        @php
            $gt = 0;
        @endphp
        @foreach ($penjualan as $key => $item)
            @php
                $gt += $item->total_harga;
            @endphp
            <tr>
                <th class="text-center">{{ $key + 1 }}</th>
                <th class="text-center">{{ $item->kode_transaksi }}</th>
                <th class="text-center">{{ date('d M Y H:i', strtotime($item->created_at)) }}</th>
                <th class="text-center">{{ $item->pelanggan->nama }}</th>
                <th class="text-center">{{ number_format($item->total_harga) }}</th>
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($detail as $items)
                
                @if ($items->kode_transaksi == $item->kode_transaksi)

                    <tr>
                        <td colspan="5">
                           
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $items->barang->nama_barang }}</td>
                                    <td>{{ number_format($items->barang->harga) }}</td>
                                    <td>{{ $items->qty }}</td>
                                    <td>{{ number_format($items->total) }}</td>
                                </tr>
                            
                        </td>
                    </tr>

                @endif
               
            @endforeach
            <tr>
                <td colspan="5" style="background-color: black"></td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3"><b> Grand Total </b></td>
            <td colspan="2" class="text-center"><b>Rp. {{ number_format($gt) }} </b></td>
        </tr>
    </table>
</body>

</html>
