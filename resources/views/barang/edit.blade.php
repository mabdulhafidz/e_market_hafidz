
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
            <div class="form-group row">
              <label for="kode_barang" class="col-sm-4 col-form-label">Kode Barang</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="kode_barang_edit" name='kode_barang'>
              </div>
              <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_barang_edit" name='nama_barang'>
              </div>
              <label for="produk_id" class="col-sm-4 col-form-label">Produk</label>
              <div class="col-sm-8">
             <select class="form-control" id="produk_id_edit" name="produk_id" >
              <option selected disabled>silahkan pilih produk</option>
              @foreach ($produk as $value =>$label)
              <option value="{{$value}}">{{$label}}</option>
                  
              @endforeach
             </select>
              </div>

              <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="satuan_edit" name='satuan'>
              </div>

              <label for="harga_jual" class="col-sm-4 col-form-label">Harga Barang</label>
              <div class="col-sm-8 " >
                <input type="text" class="form-control" id="harga_jual_edit" name='harga_jual'>
              </div>

              <label for="stok_barang" class="col-sm-4 col-form-label">Stok Barang</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="stok_barang_edit" name='stok_barang'>
              </div>
              <label for="ditarik" class="col-sm-4 col-form-label">Ditarik</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="ditarik_edit" name='ditarik'>
              </div>
              
              <label for="user_id" class="col-sm-4 col-form-label">User</label>
              <div class="col-sm-8">
                <select class="form-control" name="user_id" id="user_id_edit">
                  <option selected disabled>silahkan pilih user</option>
                  @foreach ($users as $value =>$label)
                  <option value="{{$value}}" >{{$label}}</option>
                      
                  @endforeach
                 </select>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah barang</button>
       
        </div>
      </div>
    </div>
  </div> 
</form>
