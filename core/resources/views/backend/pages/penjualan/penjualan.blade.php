@extends('backend.master')
@section('breadcumb')
    Penjualan
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
                            <a href="{{ route('penjualan.add') }}" class="btn btn-primary font-weight-bolder">
                                <span class="svg-icon svg-icon-md">
                                    <i class="fas fa-plus"></i>
                                </span>Tambah Faktur</a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->

                        <table class="table table-bordered" id="user_table">
                            <thead>
                                <tr>
                                    <th width="10px">No.</th>
                                    <th>No Faktur</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Pelanggan</th>
                                    <th>Total Penjualan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualan as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->kode_transaksi }}</td>
                                        <td>{{ date('d F Y H:i', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->pelanggan->nama }}</td>
                                        <td>Rp. {{ number_format($item->total_harga) }}</td>

                                        <td nowrap="nowrap">
                                            <div class="dropdown dropdown-inline mr-4">
                                                <button type="button" class="btn btn-light-primary btn-icon btn-sm"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ki ki-bold-more-hor"></i>
                                                </button>

                                                <div class="dropdown-menu" style="">
                                                    <button type="button" class="dropdown-item"
                                                        id="{{ $item->kode_transaksi }}" onclick="lihatFaktur(this)">Lihat
                                                        Faktur</button>
                                                    @if (auth()->user()->id == $item->user_id)
                                                        <a class="dropdown-item" onclick="hapusPenjualan(this)"
                                                            id="{{ $item->id }}" href="javascript:void(0)">Hapus</a>
                                                    @endif
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

    <div class="modal fade" role="dialog" id="modalFaktur" aria-labelledby="myModal" aria-hidden="true">

    </div>
@endsection
@section('js-custom')
    <script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        $('#user_table').DataTable({
            responsive: true,
        })
        @if (session('success'))
            customAlert('Sukses !','{{ session('success') }}','success')
        @endif

        function lihatFaktur(thiss) {
            let no_faktur = $(thiss).attr('id');
            $.ajax({
                url: '{{ route('penjualan.lihatfaktur') }}',
                type: 'get',
                data: {
                    kode_transaksi: no_faktur
                },
                beforeSend: function() {
                    myBlock();
                },
                success: function(res) {
                    KTApp.unblockPage();
                    $('#modalFaktur').html(res);
                    $('#modalFaktur').modal('show');
                },

            })
        }

        function hapusPenjualan(obj) {
            let id = $(obj).attr('id');
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
                        url: '{{ route('penjualan.destroy') }}',
                        type: 'get',
                        data: {
                            id: id,
                        },
                        beforeSend: function() {
                            KTApp.blockPage({
                                overlayColor: '#000000',
                                state: 'danger',
                                message: 'Silahkan Tunggu...'
                            });
                        },
                        success: function(res) {
                            KTApp.unblockPage();
                            console.log(res);
                            Swal.fire(
                                "Terhapus!",
                                "Data berhasil di hapus.",
                                "success"
                            ).then(function() {
                                window.location.reload();
                            })
                        }
                    })
                }
            });
        }

    </script>
@endsection
