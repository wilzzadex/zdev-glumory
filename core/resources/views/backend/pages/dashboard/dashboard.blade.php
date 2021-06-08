@extends('backend.master')
@section('breadcumb')
    Dashboard
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <!--begin::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid" >
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row ">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <CENTER>

                                <h3>Selamat Datang di Aplikasi Perhitungan PPH Final Hafara Cantik Indonesia</h3> <br>
                                <span>Ciganitri No.18 Ruko Garden City, Kec.Bojongsoang, Bandung</span>
                                <br>
                                <br>
                                <img src="{{ asset('assets/gli-da.jpeg') }}" style="width: 100%" alt="">
                            </CENTER>
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Row-->
        
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection