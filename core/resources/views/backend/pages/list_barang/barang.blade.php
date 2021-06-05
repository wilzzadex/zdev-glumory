@extends('backend.master')
@section('breadcumb')
    List Barang
@endsection

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content" style="margin-top: -50px">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
          
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                   <div class="card-title">

                   </div>
                    <div class="card-toolbar">
                        <a href="{{ route('barang.add') }}" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                           <i class="fas fa-plus"></i>
                        </span>Tambah Barang</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    
                    <table class="table table-bordered" id="user_table">
                        <thead>
                            <tr>
                                <th width="10px">No.</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga (Rp)</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($barang as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ number_format($item->harga) }}</td>
                            <td nowrap="nowrap">
                                <div class="dropdown dropdown-inline mr-4">
                                    <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href="{{ route('barang.edit',$item->id) }}">Edit</a>
                                        <a class="dropdown-item" onclick="hapusBarang(this)" id="{{ $item->id }}" href="javascript:void(0)">Hapus</a>
                                    </div>
                                </div>
                            </td>
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
    $('#user_table').DataTable({
        responsive: true,
    })
    @if(session('success'))
        customAlert('Sukses !','{{ session("success") }}','success')
    @endif

    

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
                // Swal.fire(
                //     "Deleted!",
                //     "Your file has been deleted.",
                //     "success"
                // )
            }
        });
    }
</script>
@endsection