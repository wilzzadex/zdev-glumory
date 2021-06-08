<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PPH Final</title>
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
        <h5><b> Rekapan PPH Final UMKM (0,5 %) Tahun {{ $tahun }}</h5> </b>
    </center>
    <table id="data" style="width:100%">
        <tr>
            <th class="text-center">NO.</th>
            <th class="text-center">MASA PAJAK</th>
            <th class="text-center">TOTAL PENJUALAN</th>
            <th class="text-center">JUMLAH PAJAK (0,5 %)</th>
            {{-- <th class="text-center">TOTAL</th> --}}
        </tr>
        @php
            $gt = 0;
            $gp = 0;
        @endphp
        @foreach ($penjualan as $key => $item)
            @php
                $pph = ((10 / 100) * $item->total) / 2;
                $bulan = \App\Models\Master_Bulan::where('id', $item->bulan)->first();
                $gt += $item->total;
                $gp += $pph;
            @endphp
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td class="text-center">{{ $bulan->nama }} {{ $item->tahun }}</td>
                <td class="text-center">Rp. {{ number_format($item->total) }}</td>
                <td class="text-center">Rp. {{ number_format($pph) }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2"><b>Grand Total</b></td>
            <td class="text-center"> <b> Rp. {{ number_format($gt) }} </b></td>
            <td class="text-center"> <b> Rp. {{ number_format($gp) }} </b></td>
        </tr>

    </table>
</body>

</html>
