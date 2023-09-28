<div class="modal fade" id="formPelangganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form method="POST" action="" class="form-edit">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                      <label for="nama_pelanggan" class="col-form-label">Nama Pelanggan</label>
                      <input type="text" class="form-control" id="nama_pelanggan_edit" name="nama_pelanggan" placeholder="Nama Pelanggan">
                  </div>
                  <div class="form-group">
                      <label for="kode_pelanggan" class="col-form-label">Kode Pelanggan</label>
                      <input type="text" class="form-control" id="kode_pelanggan_edit" name="kode_pelanggan" placeholder="Kode Pelanggan">
                  </div>
                  <div class="form-group">
                    <label for="alamat" class="col-form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat_edit" name="alamat" placeholder="Alamat">
                </div>
                  <div class="form-group">
                    <label for="no_telp" class="col-form-label">No Telp</label>
                    <input type="text" class="form-control" id="no_telp_edit" name="no_telp" placeholder="No Telp">
                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="text" class="form-control" id="email_edit" name="email" placeholder="email">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
          </div>
          
      </div>
  </div>
</div>
