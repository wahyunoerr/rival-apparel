@extends('templateb.index')
@section('title', 'Product')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h4 class="card-title">Product</h4>
                </div>
                <div class="col-6">
                    <button type="button" onclick="addForm()" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#formKat"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="table-responsive">
                <table id="product-table" class="table table-bordered zero-configuration">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Name</th>
                            <th>Gambar</th>
                            <th>Ukuran</th>
                            <th>Kategori</th>
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
                            <th>Gambar</th>
                            <th>Ukuran</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th width="10px">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    @include('backend.product.form')
    @push('scripts')
        <script type="text/javascript">
            var table = $('#product-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('productAjax') }}",
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
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'gambar',
                        name: 'gambar',
                        render: function(data, type, full, meta) {
                            return '<img src="' + data +
                                '" alt="Product Image" class="img-thumbnail" width="50">';
                        }
                    },
                    {
                        data: 'ukuran_id',
                        name: 'ukuran_id'
                    },
                    {
                        data: 'kategori_id',
                        name: 'kategori_id'
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
                $('#formProd').modal('show');
                $('#formProd form')[0].reset();
                $('.modal-title').text('Add Product');
            }

            function delProd(id) {
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
                            url: "{{ url('product') }}/" + id,
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

            function editProd(id) {
                save_method = 'edit';
                $('input[name=_method]').val('PATCH');
                $('#formProd form')[0].reset();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ url('product') }}/" + id + "/edit",
                    type: "GET",
                    dataType: "JSON",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(data) {
                        $('#formProd').modal('show');
                        $('.modal-title').text('Edit Product');

                        $('#id').val(data.id);
                        $('#nameProd').val(data.name);
                        $('#foto').val(data.gambar);
                        $('#ukurProd').val(data.ukuran_id);
                        $('#katProd').val(data.kategori_id);
                        $('#harProd').val(data.harga);
                    },
                    error: function(data, xhr, status, error) {
                        swal("Peringatan!!", "Terjadi kesalahan pada data!", "warning");
                    }
                });
            }

            $(function() {
                $('#formProd form').on('submit', function(e) {
                    e.preventDefault();

                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    var id = $('#id').val();

                    if (save_method == 'add') {
                        url = "{{ route('product.save') }}";
                    } else {
                        url = "{{ url('product') }}/" + id + "/edit";
                    }

                    $.ajax({
                        url: url,
                        type: "POST",
                        data: new FormData($('#formProd form')[0]),
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('#formProd').modal('hide');
                            table.ajax.reload();
                            swal("Berhasil", "Product Berhasil disimpan!!", "success");
                        },
                        error: function(data, xhr, status, error) {
                            swal("Peringatan", "Product gagal tersimpan", "warning");
                        }
                    })
                });
            })
        </script>
    @endpush
@endsection
