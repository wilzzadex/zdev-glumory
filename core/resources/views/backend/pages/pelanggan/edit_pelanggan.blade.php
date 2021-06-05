@extends('backend.master')
@section('breadcumb')
    Data Pelanggan / Edit Pelanggan
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Edit Pelanggan</h3>
                        </div>
                        <div class="container">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('pelanggan.update',$pelanggan->id) }}" id="userAdd">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama
                                    <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nama" value="{{ $pelanggan->nama }}" placeholder="Nama" />
                                </div>
                                <div class="form-group">
                                    <label>No Telpon
                                    <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="no_telp" value="{{ $pelanggan->no_telp }}" placeholder="No telp" />
                                </div>
                                <div class="form-group">
                                    <label>Alamat <span class="text-danger">*</span></label></label>
                                    <textarea name="alamat" class="form-control" cols="30" rows="10">{{ $pelanggan->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
   
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('js-custom')
<script type="text/javascript">
    @if(session('success'))
        customAlert('Sukses !','{{ session("success") }}','success')
    @endif

    var runValidator = function () {
        var form = $('#userAdd');
        var errorHandler = $('.errorHandler', form);
        var successHandler = $('.successHandler', form);
        form.validate({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'invalid-feedback',
            errorPlacement: function ( error, element ) {
                // Add the `invalid-feedback` class to the error element
                error.addClass( "invalid-feedback" );

                if ( element.prop( "type" ) === "checkbox" ) {
                    error.insertAfter( element.next( "label" ) );
                } else {
                    error.insertAfter( element );
                }
            },
            ignore: "",
            rules: {
                nama : "required",
                no_telp: {
                    required: true,
                    digits : true,
                    minlength : 8,
                },
                alamat: {
                    required: true,
                    minlength : 5,
                },
                
            },
            messages: {
                no_telp: {
                    required: "Masukan nomor yang benar",
                   
                },
                
            },
            errorElement: "em",
            invalidHandler: function (event, validator) { //display error alert on form submit
                successHandler.hide();
                errorHandler.show();
            },
            highlight: function ( element, errorClass, validClass ) {
                $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
            },
            unhighlight: function (element, errorClass, validClass) {
                $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.validate ').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                // $('#alert').hide();
                successHandler.show();
                errorHandler.hide();
                // submit form
                if (successHandler.show()) {
                    myBlock()
                    form.submit();
                }
            }
        });
    };
    runValidator();
</script>
@endsection