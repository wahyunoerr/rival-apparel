<div class="modal fade" id="formProd">
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
                    @method('POST')
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nameProd">Nama Produk :</label>
                        <input type="text" name="name" id="nameProd" class="form-control"
                            placeholder="Masukkan Nama Produk" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nameProd">Gambar Produk :</label>
                        <input type="file" name="gambar" id="foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nameProd">Ukuran :</label>
                        <select name="ukuran" id="ukurProd" class="form-control">
                            @foreach ($ukuran as $item)
                                <option value="{{ $item->id }}">{{ $item->nUkuran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nameProd">Kategori Produk :</label>
                        <select name="kategori" id="katProd" class="form-control">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nameProd">Harga :</label>
                        <input type="number" name="harga" id="harProd" class="form-control"
                            placeholder="Masukkan Harga Produk">
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
