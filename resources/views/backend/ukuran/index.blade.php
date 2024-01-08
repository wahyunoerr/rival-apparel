@extends('templateb.index')
@section('title', 'Ukuran')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-title">Ukuran</h4>
                </div>
                <div class="col-6">
                    <button type="button" onclick="addForm()" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#formUkur"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="table-responsive">
                <table id="ukuran-table" class="table table-bordered zero-configuration">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Name</th>
                            <th>Harga</th>
                            <th width="10px">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th width="10px">No</th>
                            <th>Name</th>
                            <th>Harga</th>
                            <th width="10px">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @include('backend.ukuran.form')
    @push('scripts')
        <script type="text/javascript">
            var table = $('#ukuran-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('ajaxUkuran') }}",
                columns: [{
                        data: null,
                        name: '#',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'nUkuran',
                        name: 'nUkuran'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false
                    }
                ]
            });

            function addForm() {
                save_method = 'add';
                $('#formUkur').modal('show');
                $('#formUkur form')[0].reset();
                $('.modal-title').text('Add Ukuran');
            }

            function delUk(id) {
                swal({
                    title: "Are you sure to delete?",
                    text: "You will not be able to recover this imaginary file!!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!!",
                    cancelButtonText: "No, cancel it!!",
                    closeOnConfirm: !1,
                    closeOnCancel: !1,
                    showLoaderOnConfirm: !0
                }, function(isConfirmed) {
                    if (isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: "{{ url('ukuran') }}/" + id,
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "_method": "DELETE"
                            },
                            success: function(data) {
                                table.ajax.reload();
                                setTimeout(function() {
                                    swal("Terhapus!!", "Hey, Kategori Berhasil Dihapus!!",
                                        "success");
                                }, 2e3)
                            },
                            error: function(xhr, status, error) {
                                swal("Gagal!", "Terjadi kegagalan ketika menghapus data :(", "error");
                            }
                        });
                    } else {
                        swal("Peringatan!!", "Anda tidak menghapus data!", "error");
                    }
                });
            }

            function editUk(id) {
                save_method = 'edit';
                $('input[name=_method]').val('PATCH');
                $('#formUkur form')[0].reset();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ url('ukuran') }}/" + id + "/edit",
                    type: "GET",
                    dataType: "JSON",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(data) {
                        $('#formUkur').modal('show');
                        $('.modal-title').text('Edit Ukuran');

                        $('#id').val(data.id);
                        $('#nameUkuran').val(data.nUkuran);
                        $('#hargaUkur').val(data.harga);
                    },
                    error: function(data, xhr, status, error) {
                        swal("Peringatan!!", "Terjadi kesalahan pada data!", "warning");
                    }
                });
            }

            $(function() {
                $('#formUkur form').on('submit', function(e) {
                    e.preventDefault();

                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    var id = $('#id').val();

                    if (save_method == 'add') {
                        url = "{{ route('ukuran.save') }}";
                    } else {
                        url = "{{ url('ukuran') }}/" + id;
                    }

                    $.ajax({
                        url: url,
                        type: "POST",
                        data: new FormData($('#formUkur form')[0]),
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('#formKat').modal('hide');
                            table.ajax.reload();
                            swal("Berhasil", "Kategori Berhasil disimpan!!", "success");
                        },
                        error: function(data, xhr, status, error) {
                            swal("Peringatan", "Kategori gagal tersimpan", "warning");
                        }
                    })
                });
            })
        </script>
    @endpush
@endsection
