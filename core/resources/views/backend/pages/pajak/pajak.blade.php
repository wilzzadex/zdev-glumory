@extends('backend.master')
@section('breadcumb')
    Rekapan PPH Final UMKM (0,5 %) Tahun {{ $tahun }}
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">

                <div class="card card-custom gutter-b">
                    {{-- <input type="hidden"> --}}
                    <div class="form-group row mt-5 ml-5">
                        <div class="col-5">
                            <label>Plih Tahun</label>
                            <select name="tahun" class="form-control" id="tahun">
                                <option value="2021" {{ $tahun == '2021' ? 'selected' : '' }}>2021</option>
                                <option value="2020" {{ $tahun == '2020' ? 'selected' : '' }}>2020</option>
                                <option value="2019" {{ $tahun == '2019' ? 'selected' : '' }}>2019</option>
                                <option value="2018" {{ $tahun == '2018' ? 'selected' : '' }}>2018</option>
                                <option value="2017" {{ $tahun == '2017' ? 'selected' : '' }}>2017</option>
                                <option value="2016" {{ $tahun == '2016' ? 'selected' : '' }}>2016</option>
                                <option value="2015" {{ $tahun == '2015' ? 'selected' : '' }}>2015</option>
                            </select>
                        </div>
                        
                    </div>
                   
                    <div class="card-body">
                        <!--begin: Datatable-->

                        <table class="table table-bordered" id="user_table">
                            <thead>
                                <tr>
                                    <th width="10px">No.</th>
                                    <th>Masa Pajak</th>
                                    <th>Total Penjualan</th>
                                    <th>Jumlah Pajak (0,5 %)</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pajak as $key => $item)
                                    @php
                                        $pph = ((10 / 100) * $item->total) / 2;
                                        $bulan = \App\Models\Master_Bulan::where('id',$item->bulan)->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $bulan->nama }} {{ $item->tahun }}</td>
                                        <td>Rp. {{ number_format($item->total) }}</td>
                                        <td>Rp. {{ number_format($pph) }}</td>
                                    </tr>

                                @endforeach
                                
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
@endsection
@section('js-custom')
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        $('#user_table').DataTable()
        $('#tahun').on('change',function(){
            let tahun = $(this).find(':selected').val();
            window.location.href = '{{ url("admin/pph/") }}' + '/' + tahun;
        })

    </script>
@endsection
