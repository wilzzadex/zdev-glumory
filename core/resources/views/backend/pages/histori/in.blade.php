@extends('backend.master')
@section('breadcumb')
  Histori Barang Masuk (In)
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-4">
                            
                            <div style="display: " id="filter_bulan">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="">Pilih Bulan</label>
                                        <div class="input-group input-group-solid date" data-target-input="nearest">
                                            <select name="" id="input_tanggal" class="form-control">
                                                <option value="01" {{ date('m') == '01' ? 'selected' : '' }}>Januari</option>
                                                <option value="02" {{ date('m') == '02' ? 'selected' : '' }}>Februari</option>
                                                <option value="03" {{ date('m') == '03' ? 'selected' : '' }}>Maret</option>
                                                <option value="04" {{ date('m') == '04' ? 'selected' : '' }}>April</option>
                                                <option value="05" {{ date('m') == '05' ? 'selected' : '' }}>Mei</option>
                                                <option value="06" {{ date('m') == '06' ? 'selected' : '' }}>Juni</option>
                                                <option value="07" {{ date('m') == '07' ? 'selected' : '' }}>Juli</option>
                                                <option value="08" {{ date('m') == '08' ? 'selected' : '' }}>Agustus</option>
                                                <option value="09" {{ date('m') == '09' ? 'selected' : '' }}>September</option>
                                                <option value="10" {{ date('m') == '10' ? 'selected' : '' }}>Oktober</option>
                                                <option value="11" {{ date('m') == '11' ? 'selected' : '' }}>November</option>
                                                <option value="12" {{ date('m') == '12' ? 'selected' : '' }}>Desember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="">Tahun</label>
                                        <select name="" class="form-control form-control-solid" id="input_tahun">
                                            <option value="2020" {{ date('Y') == '2020' ? 'selected' : '' }}>2020</option>
                                            <option value="2021" {{ date('Y') == '2021' ? 'selected' : '' }}>2021</option>
                                            <option value="2022" {{ date('Y') == '2022' ? 'selected' : '' }}>2022</option>
                                            <option value="2023" {{ date('Y') == '2023' ? 'selected' : '' }}>2023</option>
                                            <option value="2014" {{ date('Y') == '2024' ? 'selected' : '' }}>2024</option>
                                            <option value="2025" {{ date('Y') == '2025' ? 'selected' : '' }}>2025</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                   <div class="card-title">
                        Data Histori Barang Masuk Bulan &nbsp; <span id="title-tabel"></span>
                       
                   </div>
                   
                 
                  
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    
                    <table class="table table-bordered" id="user_table">
                        <thead>
                            <tr>
                                <th width="10px">No.</th>
                                <th>Tanggal Masuk</th>
                                {{-- <th></th> --}}
                                <th>No Faktur</th>
                                <th>Suplier</th> 
                                <th>Aksi</th> 
                            </tr>
                           
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <td>1.</td>
                                <td>08 Januari 2021</td>
                                <td>INV-23455</td>
                                <td>PT. TES SATU</td>
                                <td><button class="btn btn-warning">Cetak Kontrabon</button></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>09 Januari 2021</td>
                                <td>INV-14555</td>
                                <td>PT. TES DUA</td>
                                <td><button class="btn btn-warning">Cetak Kontrabon</button></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>10 Januari 2021</td>
                                <td>INV-22334</td>
                                <td>PT. TES TIGA</td>
                                <td><button class="btn btn-warning">Cetak Kontrabon</button></td>
                            </tr> --}}
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
    function print()
    {
        // console.log(elem)
       
        var elem_head = $('#preview-table-head').html();
        
        var mywindow = window.open('', 'PRINT', 'height=1100,width=900');

        mywindow.document.write('<html><head><title>' + document.title  + '</title>');
        mywindow.document.write('</head></head>');
        mywindow.document.write('<h3>Barang Masuk</h3>');
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

    let input_tanggal = $('#input_tanggal').find(':selected').val();
    let input_tahun = $('#input_tahun').find(':selected').val();
    let title_tanggal = $('#input_tanggal').find(':selected').html();

    $('#title-tabel').html(' ' + title_tanggal + ' ' + input_tahun)

    renderTable(input_tanggal, input_tahun);

    $('#input_tanggal').on('change', function(){
        input_tanggal = $(this).find(':selected').val();
        $('#user_table').dataTable().fnDestroy();
        renderTable(input_tanggal, input_tahun);
        title_tanggal = $('#input_tanggal').find(':selected').html();
        $('#title-tabel').html(' ' + title_tanggal + ' ' + input_tahun)
    })

    $('#input_tahun').on('change', function(){
        input_tahun = $(this).find(':selected').val();
        $('#user_table').dataTable().fnDestroy();
        renderTable(input_tanggal, input_tahun);
        $('#title-tabel').html(' ' + title_tanggal + ' ' + input_tahun)
    })

    function renderTable(bulan,tahun){
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                url : "{{ route('data.histori.masuk') }}",
                type : 'get',
                data : {
                    tahun : input_tahun,
                    bulan : input_tanggal
                },
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'tanggal_transaksi', name: 'tanggal_transaksi'},
                {data: 'kode', name: 'kode'},
                {data: 'suplier', name: 'suplier'},
                {data: 'aksi', name: 'aksi'},
               
            ]
        })
    }
    

    @if(session('msg'))
        Swal.fire('Sukses!','{{ session("msg") }}','success');
    @endif

    var arrows;
    if (KTUtil.isRTL()) {
    arrows = {
    leftArrow: '<i class="la la-angle-right"></i>',
    rightArrow: '<i class="la la-angle-left"></i>'
    }
    } else {
    arrows = {
    leftArrow: '<i class="la la-angle-left"></i>',
    rightArrow: '<i class="la la-angle-right"></i>'
    }
    }

    $('input:radio[name="jenis"]').change(
            function(){
                if ($(this).is(':checked') && $(this).val() == 'day') {
                    $('#filter_day').css('display','');
                    $('#filter_bulan').css('display','none');
                } else if($(this).is(':checked') && $(this).val() == 'bulan'){
                    $('#filter_day').css('display','none');
                    $('#filter_bulan').css('display','');
                }
    });

    $('#tanggal').datetimepicker({
        format: 'L'
    });

    function hapusBarang(obj){
        let id = $(obj).attr('id');
        Swal.fire({
            title: "Anda Yakin ?",
            text: "Data akan terhapus permanen",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Iya, Hapus saja!",
            cancelButtonText: "Tidak, Batalkan!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    url : '{{ route("barang.destroy") }}',
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
                            window.location.reload();
                        })
                    }
                })
            }
        });
    }
</script>
@endsection