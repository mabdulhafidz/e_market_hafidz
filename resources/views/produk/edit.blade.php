
<div class="modal fade" id="formProdukModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="" class="form-edit">
                @csrf
                @method('put')
                <div class="form-group row">
                  <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_produk_edit" name="nama_produk" placeholder="Nama Produk">
                  </div>
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
