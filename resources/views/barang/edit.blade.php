<!-- Modal -->
<div class="modal fade" id="formBarangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form method="POST" action="" class="form-edit">
                  @csrf
                  @method('PUT')

                  <div class="form-group">
                      <label for="kode_barang">Kode Barang</label>
                      <input type="text" class="form-control" id="kode_barang_edit" name="kode_barang">
                  </div>

                  <div class="form-group">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control" id="nama_barang_edit" name="nama_barang">
                  </div>

                  <div class="form-group">
                      <label for="produk_id">Produk</label>
                      <select class="form-control" id="produk_id_edit" name="produk_id">
                          <option selected disabled>Silahkan pilih produk</option>
                          @foreach ($produk as $value => $label)
                              <option value="{{ $value }}">{{ $label }}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                      <label for="satuan">Satuan</label>
                      <input type="text" class="form-control" id="satuan_edit" name="satuan">
                  </div>

                  <div class="form-group">
                      <label for="harga_jual">Harga Barang</label>
                      <input type="text" class="form-control" id="harga_jual_edit" name="harga_jual">
                  </div>

                  <div class="form-group">
                      <label for="stok_barang">Stok Barang</label>
                      <input type="text" class="form-control" id="stok_barang_edit" name="stok_barang">
                  </div>

                  <div class="form-group">
                      <label for="ditarik">Ditarik</label>
                      <input type="text" class="form-control" id="ditarik_edit" name="ditarik">
                  </div>

                  <div class="form-group">
                      <label for="user_id">User</label>
                      <select class="form-control" name="user_id" id="user_id_edit">
                          <option selected disabled>Silahkan pilih user</option>
                          @foreach ($users as $value => $label)
                              <option value="{{ $value }}">{{ $label }}</option>
                          @endforeach
                      </select>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah Barang</button>
          </div>
      </div>
  </div>
</div>
