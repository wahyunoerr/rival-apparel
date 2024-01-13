<div class="modal fade" id="formUkur">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nameUkur">Nama Ukuran :</label>
                        <input type="text" name="nUkuran" id="nameUkur" class="form-control"
                            placeholder="Masukkan Ukuran" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nameUkur">Harga :</label>
                        <input type="number" name="harga" id="hargaUkur" class="form-control"
                            placeholder="Masukkan Ukuran" autofocus>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
