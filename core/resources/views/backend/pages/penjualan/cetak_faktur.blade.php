<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktur Penjualan | {{ $penjualan->kode_transaksi }}</title>
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
    <table id="data" style="width:100%">
        <tr>
            <td style="width: 60%" colspan="3">
                <div class="row">
                    <div class="col-6 text-center">
                        <img width="40%" src="{{ url('assets/glu.png') }}" alt="">
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <h5>FAKTUR</h5>
                            </div>
                            <div class="col-12">
                                No. {{ $penjualan->kode_transaksi }}
                            </div>
                            <div class="col-12">
                                {{-- <span>NAMA APLIKASI</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 text-center">
                        <span>NAMA APLIKASI</span>
                    </div>
                </div>
            </td>
            <td colspan="3">
                <div class="row">
                    <div class="col-6">
                        KEPADA :
                    </div>
                    <div class="col-6 float-right">
                        {{ date('Y/m/d/', strtotime($penjualan->created_at)) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {{ $penjualan->pelanggan->nama }}
                    </div>
                    <div class="col-12 float-right">
                        {{ $penjualan->pelanggan->alamat }}
                    </div>
                    <div class="col-12 float-right">
                        Telp : {{ $penjualan->pelanggan->no_telp }}
                    </div>
                </div>

            </td>
        </tr>

        <tr>
            <td class="text-center">NO.</td>
            <td class="text-center">NAMA BARANG</td>
            <td class="text-center">HARGA SATUAN</td>
            <td class="text-center">QTY</td>
            <td class="text-center">TOTAL HARGA</td>
        </tr>
        @php
            $total = 0;
        @endphp
        @foreach ($detail as $key => $item)
        @php
            $total+=$item->total;
        @endphp
            <tr>
                <td>{{ $key + 1 }}</td>
                <td class="text-center">{{ $item->barang->nama_barang }}</td>
                <td class="text-center">Rp. {{ number_format($item->barang->harga) }}</td>
                <td class="text-center">{{ $item->qty }}</td>
                <td class="text-center">Rp .{{ number_format($item->total) }}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="3"><b>Grand Total</b></td>
            <td colspan="2" class="text-center"><b>Rp. {{ number_format($total) }}</b></td>
        </tr>

        {{-- @foreach ($detail_penjualan as $key => $item)
        <tr>
            <td>{{ $item->obat->nama_obat }}</td>
            <td class="text-center">{{ $item->diskon }} %</td>
            <td class="text-center">{{ $item->jumlah_obat }} {{ $item->unit->nama }}</td>
            <td class="text-center">{{ number_format($item->harga) }}</td>
            <td class="text-center">{{ number_format($item->subtotal) }}</td>
        </tr>
        @endforeach
        <tr>
            <th class="text-center">TOTAL 1</th>
            <th class="text-center">POT PENJUALAN</th>
            <th class= "text-center">TOTAL 2</th>
            <th class="text-center">PPN</th>
            <th colspan="2" class="text-center">JUMLAH TAGIHAN</th>
        </tr>
        <tr>
            <th class="text-center">{{ number_format($penjualan->total_1) }}</th>
            <th class="text-center">{{ number_format($penjualan->pot_pen) }}</th>
            <th class= "text-center">{{ number_format($penjualan->total_1 - $penjualan->pot_pen) }}</th>
            <th class="text-center">{{ number_format(($penjualan->pajak / 100) * $penjualan->jumlah_tagihan) }}</th>
            <th colspan="2" class="text-center">{{ number_format($penjualan->total_1 - $penjualan->pot_pen) }}</th>
        </tr>
        <tr>
            <td colspan="6">Terbilang : {{ $penjualan->terbilang }}</td>
        </tr> --}}

    </table>
</body>

</html>
