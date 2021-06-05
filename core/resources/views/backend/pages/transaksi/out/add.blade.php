@extends('backend.master')
@section('css-custom')
    <style>
        .error{
            color: red !important;
        }
    </style>
@endsection
@section('breadcumb')
    Barang Keluar / Tambah Barang Keluar
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
                            <h3 class="card-title">Tambah Barang Keluar</h3>
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
                        
                            @csrf
                            <div class="card-body">
                                <form id="form_add">
                                    <div class="form-group row">
                                        <div class="col-4">
                                            <label>Barang
                                                <span class="text-danger">*</span></label> <br>
                                            <select name="kode_barang" required id="kode_barang" class="form-control">
                                                <option value="">- Pilih Barang -</option>
                                                @foreach ($barang as $item)
                                                    <option value="{{ $item->kode_barang }}">{{ $item->kode_barang }} - {{ $item->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label>Jumlah (Kg)
                                                <span class="text-danger">*</span></label>
                                                <input type="text" required class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah ...">
                                        </div>
                                        <div class="col-3">
                                            <label>Harga
                                                <span class="text-danger">*</span></label>
                                                <input type="text" required class="form-control" name="harga" id="harga" placeholder="Masukkan Harga ...">
                                        </div>
                                        <div class="col-2" id="aksi-simpan">
                                            <label for="">Aksi</label><br>
                                            <button type="button" id="btn-simpan" class="btn btn-primary">Tambah</button>
                                        </div>
                                        <div class="col-2" id="aksi-edit" style="display: none">
                                            <label for="">Aksi</label><br>
                                            <button type="button" id="btn-ubah" class="btn btn-primary">Ubah</button>
                                            <button type="button" id="btn-batal" class="btn btn-warning">Batal</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                         
                        <!--end::Form-->
                    </div>
   
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h5 class="card-title">Preview Barang Masuk</h5>
                        </div>
                        {{-- <div class="alert alert-warning">Pastikan Data Sudah Sesuai sebelum disimpan !</div> --}}
                        <div class="card-body" id="render_table">
                            <table class="table table-bordered" id="preview-table">
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
                                    @foreach ($barang_masuk as $key => $item)
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
                                        <td id="td-aksi">
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
                                        {{-- <th>{{ number_format($total_harga_ppn,2,',','.') }}</th> --}}
                                        {{-- <th>{{ number_format($total_total,2,',','.') }}</th> --}}
                                        <th id="tf-aksi">
                                            @if (count($barang_masuk) > 0)
                                                <button onclick="print()" type="button" id="btn-print" class="btn btn-primary">Cetak</button>
                                                <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-success">Simpan</button>
                                            @endif
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pastikan Data Sudah sesuai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('out.store.all') }}" id="form-add-all" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">Pembeli</label>
                    <input type="text" name="suplier" class="form-control" required>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
       
      </div>
    </div>
  </div>
@endsection
@section('js-custom')
<script type="text/javascript">

    const regex = /[^\d.]|\.(?=.*\.)/g;
    const subst=``;

    function print()
    {
        // console.log(elem)
        document.getElementById('th-aksi').style.display = 'none';
        document.getElementById('td-aksi').style.display = 'none';
        document.getElementById('tf-aksi').style.display = 'none';
        var elem = $('#preview-table').html();
        document.getElementById('th-aksi').style.display = '';
        document.getElementById('td-aksi').style.display = '';
        document.getElementById('tf-aksi').style.display = '';
        var mywindow = window.open('', 'PRINT', 'height=1100,width=900');

        mywindow.document.write('<html><head><title>' + document.title  + '</title>');
        mywindow.document.write('</head></head>');
        mywindow.document.write('<h3>Barang Keluar</h3>');
        mywindow.document.write('<table border="1" style="width: 100%;border-collapse: collapse;">' + elem  + '</table>');
        mywindow.document.write('<p>Dicetak Oleh : {{ auth()->user()->name }} </p>');
        mywindow.document.write('<p>Dicetak Tanggal : {{ date("d F Y") }} </p>');
        mywindow.document.write('</body></html>');
        

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/

        mywindow.print();
        mywindow.close();


        
        return true;
    }


    $('#jumlah').keyup(function(){
        const str=this.value;
        const result = str.replace(regex, subst);
        this.value=result;
    });
    
    $('#kode_barang').select2({placeholder : 'Ketik Kode / Nama Barang'});

    $('#btn-simpan').on('click',function(){
        var form = $('#form_add');
        if(form.valid()){
            // console.log(form.serialize());
            $.ajax({
                url : '{{ route("out.store.temp") }}',
                type : 'get',
                data : form.serialize(),
                beforeSend : function(){
                    KTApp.blockPage({
                        overlayColor: '#000000',
                        state: 'danger',
                        message: 'Silahkan Tunggu...'
                    });
                },
                success : function(res){
                    KTApp.unblockPage();
                    if(res == 'ada'){
                        Swal.fire('','Item sudah di input','warning');
                    }else if(res == 'no'){
                        Swal.fire('','Stok tidak tersedia','warning');
                    }else{
                        $('#render_table').html(res);
                        $('#kode_barang').val('').change()
                        $('#jumlah').val('')
                        $('#harga').val('')
                    }
                }
            })
        }
    })

    $('#btn-ubah').on('click', function(){
        let id = $(this).val();
        $.ajax({
            url : '{{ route("out.update") }}',
            type : 'get',
            data : $('#form_add').serialize() + '&id=' + id,
            beforeSend : function(){
                KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'danger',
                    message: 'Silahkan Tunggu...'
                });
            },
            success : function(res){
                // console.log(res)
                KTApp.unblockPage();
                
                if(res == 'ada'){
                    Swal.fire('','Item sudah di input','warning');
                }else{
                    Swal.fire(
                        "Sukses!",
                        "Berhasil Menyimpan Perubahan.",
                        "success"
                    ).then(function(){
                        $('#render_table').html(res);
                    })
                    $('#kode_barang').val('').change()
                    $('#jumlah').val('')
                    $('#harga').val('')
                    $('#aksi-edit').css('display','none');
                    $('#aksi-simpan').css('display','');
                }
            }
        })
    })

    $('#btn-batal').on('click',function(){
        $('#aksi-edit').css('display','none');
        $('#aksi-simpan').css('display','');
        $('#kode_barang').val('').change()
        $('#jumlah').val('')
        $('#harga').val('')
    })

    function simpan_semua(){
        Swal.fire({
            title: "Yakin Menyimpan data?",
            text: "Pastikan data sudah sesuai !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "ya!",
            cancelButtonText: "Tidak, Batalkan!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
               $('#form-add-all').submit();
            }
        });
    }
    
    $('#form-add-all').on('submit',function(){
        myBlock();
    });


    function hapus(obj){
        let id = $(obj).attr('id');
        Swal.fire({
            title: "Anda Yakin ?",
            text: "Data akan terhapus permanen",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "ya, Hapus saja!",
            cancelButtonText: "Tidak, Batalkan!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url : '{{ route("out.destroy") }}',
                    type : 'get',
                    data : {
                        id : id,
                    },
                    beforeSend: function(){
                        KTApp.blockPage({
                            overlayColor: '#000000',
                            state: 'danger',
                            message: 'Silahkan Tunggu...'
                        });
                    },
                    success: function(res){
                        KTApp.unblockPage();
                        // console.log(res);
                        Swal.fire(
                            "Terhhapus!",
                            "Data berhasil di hapus.",
                            "success"
                        ).then(function(){
                            $('#render_table').html(res);
                        })
                    }
                })
            }
        });
    }

    function edit(obj){
        let id = $(obj).attr('id');
        $.ajax({
            url : '{{ route("out.edit") }}',
            type : 'get',
            data : {
                id : id,
            },
            beforeSend : function(){
                KTApp.blockPage({
                    overlayColor: '#000000',
                    state: 'danger',
                    message: 'Silahkan Tunggu...'
                });
            },
            success: function(res){
                KTApp.unblockPage();
                $('#aksi-edit').css('display','');
                $('#aksi-simpan').css('display','none');
                $('#btn-ubah').val(res.id);
                $('#kode_barang').val(res.kode_barang).change()
                $('#jumlah').val(res.kg_in)
                $('#harga').val(formatRupiah('Rp. '+res.harga_in, 'Rp. '));
                $('html,body').animate({ scrollTop: 0 }, 'slow');
            }
        })
    }

    var rupiah = document.getElementById('harga');
		rupiah.addEventListener('keyup', function(e){
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});

 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
            // console.log(angka)
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
    

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
                nama_barang : "required",
                kode_barang : "required",
                reorder : "required",
            },
            messages: {
                
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