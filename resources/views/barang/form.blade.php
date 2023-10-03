<!-- Modal -->
<div class="modal fade" id="modalFormBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body bg-dark">
         
          <form method="post" action="barang">
            @csrf
            <div class="form-group row">
              <div>
                <label for="kode_barang" class="col-sm-8 col-form-label">Kode Barang</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="" name='kode_barang'>
                </div>
              </div>
              <div>
                <label for="nama_barang" class="col-sm-8 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama_barang" name='nama_barang'>
                </div>
              </div>
              
              <div>
                <label for="produk_id" class="col-sm-8 col-form-label">Produk</label>
                <div class="col-sm-10">
               <select class="form-control" name="produk_id" id="produk_id">
                <option selected disabled>silahkan pilih produk</option>
                @foreach ($produk as $value =>$label)
                <option value="{{$value}}" >{{$label}}</option>
                @endforeach
               </select>
                </div>
              </div>
              
              <div>
                <label for="satuan" class="col-sm-8 col-form-label">Satuan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="satuan" name='satuan'>
                </div>
              </div>
              <div>
                <label for="harga_jual" class="col-sm-8 col-form-label">Harga Barang</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="harga_jual" name='harga_jual'>
                </div>
              </div>
              
              <div>
                <label for="stok_barang" class="col-sm-8 col-form-label">Stok Barang</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="stok_barang" name='stok_barang'>
                </div>
              </div>
              <div>
                <label for="ditarik" class="col-sm-8 col-form-label">Ditarik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="ditarik" name='ditarik'>
                </div>
              </div>
             
              <div>
                <label for="user_id" class="col-sm-8 col-form-label">User</label>
                <div class="col-sm-10">
                  <select class="form-control" name="user_id" id="user_id">
                    <option selected disabled>silahkan pilih user</option>
                    @foreach ($users as $value =>$label)
                    <option value="{{$value}}" >{{$label}}</option>
                    @endforeach
                   </select>
                </div>
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
