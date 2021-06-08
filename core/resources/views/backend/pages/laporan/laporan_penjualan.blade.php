@extends('backend.master')
@section('breadcumb')
    Cetak Laporan Penjualan
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">

                <div class="card card-custom gutter-b">
                    <div class="card card-custom">
                        <div class="card-header">
                            <h3 class="card-title">
                                Laporan Penjualan
                            </h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('laporan.penjualan.cetak') }}" method="GET" target="_blank">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-4">

                                        <input type="checkbox" name="is_detail" value="is_detail" id="detail_pen"> <label
                                            for="detail_pen"> Cetak dengan detail penjualan</label> <br>

                                        <label>Pilih Periode</label>
                                        <div class='input-group' id='kt_daterangepicker_6'>
                                            <input type='text' name="tanggal" required class="form-control" readonly
                                                placeholder="Pilih rentan tanggal ..." />
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2 mb-5 float-right">Cetak</button>
                            </div>
                        </form>
                        <!--end::Form-->
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
        var start = moment().subtract(29, 'days');
        var end = moment();

        $('#kt_daterangepicker_6').daterangepicker({
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',

            startDate: start,
            endDate: end,
            ranges: {
                'Hari Ini': [moment(), moment()],
                'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
                '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
                'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                'Bulan Kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf(
                        'month')
                ]
            }
        }, function(start, end, label) {
            $('#kt_daterangepicker_6 .form-control').val(start.format('MM/DD/YYYY') + ' - ' + end.format(
                'MM/DD/YYYY'));
        });

    </script>
@endsection
