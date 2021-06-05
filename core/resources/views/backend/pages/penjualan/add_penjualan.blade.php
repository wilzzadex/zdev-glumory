@extends('backend.master')
@section('breadcumb')
    Tambah Faktur
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">

                <div class="card card-custom gutter-b">
                    <div class="card-header flex-wrap py-3">
                        <div class="card-title">
                            Tambah Faktur
                        </div>
                        {{-- <div class="card-toolbar">
                            <a href="{{ route('back.user.add') }}" class="btn btn-primary font-weight-bolder">
                                <span class="svg-icon svg-icon-md">
                                    <i class="fas fa-plus"></i>
                                </span>Tambah Faktur</a>
                            <!--end::Button-->
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('penjualan.store') }}" id="formPenjualan" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>No Faktur<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kode_transaksi" value="{{ $kode }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label>Pelanggan <span class="text-danger">*</span></label>
                                <select required class="form-control" name="pelanggan_id" id="pelanggan">
                                    <option value="">- Pilih Pelanggan -</option>
                                    @foreach ($pelanggan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>

                                    @endforeach
                                </select>
                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Daftar Barang</label>
                                    <input type="text" style="display: none" readonly name="jml_barang" required id="jml"
                                        class="form-control">
                                </div>
                                <div class="col-6"><button type="button" data-toggle="modal" data-target="#myModal"
                                        class="btn btn-success btn-sm float-right">Tambah
                                        Barang</button></div>

                                <div class="col-12">
                                    <div id="renderTabel" class="mt-2">

                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary float-right">Simpan Penjualan</button>

                        </form>
                    </div>
                </div>

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <div class="modal fade" role="dialog" id="myModalEdit" aria-labelledby="myModal" aria-hidden="true">
        
    </div>

    <div class="modal fade" role="dialog" id="myModal" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">No Faktur {{ $kode }} | Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formBarang">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="kode_transaksi" value="{{ $kode }}"
                                readonly>
                            <label>Barang</label><br>
                            <select name="barang_id" style="width: 100%" id="barang" class="form-control">
                                <option value="">- Pilih Barang -</option>
                                @foreach ($barang as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_barang }} | Rp.
                                        {{ $item->harga }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Qty</label>
                            <input type="number" class="form-control" name="qty" min="1"
                                placeholder="Masukan jumlah barang">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js-custom')
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        renderTabel();
        jmlBarang();
        $('#pelanggan').select2();
        $('#myTable').DataTable();
        $('#barang').select2();

        function renderTabel() {
            $.ajax({
                url: '{{ route('penjualan.rendertabel') }}',
                type: 'get',
                beforeSend: function() {
                    myBlock();
                },
                success: function(res) {
                    KTApp.unblockPage();
                    $('#renderTabel').html(res)
                }
            })
        }

        function jmlBarang() {
            $.ajax({
                url: '{{ route('penjualan.jmlbarangtemp') }}',
                type: 'get',
                success: function(res) {
                    $('#jml').val(res == 0 ? '' : res)
                }
            })
        }

        function editBarang(thiss) {
            let id = $(thiss).attr('id');
            $.ajax({
                url: '{{ route('penjualan.edittemp') }}',
                type: 'get',
                data : {
                    id : id
                },
                beforeSend: function() {
                    myBlock();
                },
                success: function(res) {
                    KTApp.unblockPage();
                    $('#myModalEdit').html(res);
                    $('#myModalEdit').modal('show');
                    runValidator3();
                    // console.log(res);
                }
            })
        }

        function deleteBarang(thiss) {
            let id = $(thiss).attr('id');
            Swal.fire({
                title: "Anda Yakin ?",
                text: "Data akan terhapus permanen",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus saja!",
                cancelButtonText: "Tidak, Batalkan!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: '{{ route('penjualan.deletetemp') }}',
                        type: 'get',
                        data: {
                            id: id
                        },
                        beforeSend: function() {
                            myBlock();
                        },
                        success: function(res) {
                            console.log(res);
                            KTApp.unblockPage();
                            $('#renderTabel').html('');
                            renderTabel();
                            jmlBarang();
                        }
                    })
                }
            });

        }

        var runValidator2 = function() {
            var form = $('#formPenjualan');
            var errorHandler = $('.errorHandler', form);
            var successHandler = $('.successHandler', form);
            form.validate({
                errorElement: "span", // contain the error msg in a span tag
                errorClass: 'invalid-feedback',
                errorPlacement: function(error, element) {
                    // Add the `invalid-feedback` class to the error element
                    error.addClass("invalid-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.next("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                ignore: "",
                rules: {


                },
                messages: {
                    jml_barang: {
                        required: 'Daftar Barang masih kosong !'
                    }

                },
                errorElement: "em",
                invalidHandler: function(event, validator) { //display error alert on form submit
                    successHandler.hide();
                    errorHandler.show();
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },
                success: function(label, element) {
                    label.addClass('help-block valid');
                    // mark the current input as valid and display OK icon
                    $(element).closest('.validate ').removeClass('has-error').addClass('has-success').find(
                        '.symbol').removeClass('required').addClass('ok');
                },
                submitHandler: function(form) {
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

        var runValidator = function() {
            var form = $('#formBarang');
            var errorHandler = $('.errorHandler', form);
            var successHandler = $('.successHandler', form);
            form.validate({
                errorElement: "span", // contain the error msg in a span tag
                errorClass: 'invalid-feedback',
                errorPlacement: function(error, element) {
                    // Add the `invalid-feedback` class to the error element
                    error.addClass("invalid-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.next("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                ignore: "",
                rules: {
                    barang_id: "required",
                    qty: {
                        required: true,
                        digits: true,
                    },

                },
                messages: {


                },
                errorElement: "em",
                invalidHandler: function(event, validator) { //display error alert on form submit
                    successHandler.hide();
                    errorHandler.show();
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },
                success: function(label, element) {
                    label.addClass('help-block valid');
                    // mark the current input as valid and display OK icon
                    $(element).closest('.validate ').removeClass('has-error').addClass('has-success').find(
                        '.symbol').removeClass('required').addClass('ok');
                },
                submitHandler: function(form) {
                    // $('#alert').hide();
                    successHandler.show();
                    errorHandler.hide();
                    // submit form
                    if (successHandler.show()) {
                        myBlock()

                        var formData = $('#formBarang').serialize();
                        $.ajax({
                            url: '{{ route('penjualan.addtemp') }}',
                            type: 'get',
                            data: formData,
                            success: function(res) {
                                KTApp.unblockPage();
                                if (res == 'ada') {
                                    customAlert(' ', 'Maaf, Barang sudah ada di daftar',
                                        'warning');
                                } else {
                                    $('#myModal').modal('hide');
                                    $('#renderTabel').html('');
                                    renderTabel();
                                    jmlBarang();
                                }

                            },
                            error: function() {
                                customAlert('Eror', 'kesalahan Sistem', 'error');
                            }
                        })
                    }
                }
            });
        };

        var runValidator3 = function() {
            var form = $('#formBarangEdit');
            var errorHandler = $('.errorHandler', form);
            var successHandler = $('.successHandler', form);
            form.validate({
                errorElement: "span", // contain the error msg in a span tag
                errorClass: 'invalid-feedback',
                errorPlacement: function(error, element) {
                    // Add the `invalid-feedback` class to the error element
                    error.addClass("invalid-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.next("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                ignore: "",
                rules: {
                    barang_id_edit: "required",
                    qty_edit: {
                        required: true,
                        digits: true,
                    },

                },
                messages: {


                },
                errorElement: "em",
                invalidHandler: function(event, validator) { //display error alert on form submit
                    successHandler.hide();
                    errorHandler.show();
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },
                success: function(label, element) {
                    label.addClass('help-block valid');
                    // mark the current input as valid and display OK icon
                    $(element).closest('.validate ').removeClass('has-error').addClass('has-success').find(
                        '.symbol').removeClass('required').addClass('ok');
                },
                submitHandler: function(form) {
                    // $('#alert').hide();
                    successHandler.show();
                    errorHandler.hide();
                    // submit form
                    if (successHandler.show()) {
                        myBlock()

                        var formData = $('#formBarangEdit').serialize();
                        // console.log(formData);
                        $.ajax({
                            url: '{{ route('penjualan.updatetemp') }}',
                            type: 'get',
                            data: formData,
                            success: function(res) {
                                KTApp.unblockPage();
                                if (res == 'ada') {
                                    customAlert(' ', 'Maaf, Barang sudah ada di daftar',
                                        'warning');
                                } else {
                                    $('#myModalEdit').modal('hide');
                                    $('#renderTabel').html('');
                                    renderTabel();
                                    jmlBarang();
                                }

                            },
                            error: function() {
                                customAlert('Eror', 'kesalahan Sistem', 'error');
                            }
                        })
                    }
                }
            });
        };

        runValidator();
        runValidator2();
        
    </script>
@endsection
