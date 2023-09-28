                @extends('templates.layout')

                @push('style')
                    
                @endpush

                @section('content')
                    <section class="content">

                    <!-- Default box -->
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Barang</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <div class="card-body"> 
                        @if(session('success'))
                            <div class="alert alert-success" role="alert" id="success-alert">
                              {{session('success')}}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                        @endif
                        
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                          </ul>
                        @endif
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormBarang">
                            Tambah Barang
                          </button>
                          @include('barang.data')
                          
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        Footer
                      </div>
                      <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                @include('barang.form')
                @include('barang.edit')
                  </section>
                @endsection
                @push('script')
                    <script>
                      
                // success closed automatically
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function()  {
                  $("#success-alert").slideUp(500);
                });

                //initialization
                $(document).ready(function() {
                  $('#tbl-barang').DataTable()

                // dialog hapus data
                $('.btn-delete').on('click', function(e){  
                  let nama_barang = $(this).closest('tr').find('td:eq(0)').text();
                  Swal.fire({
                    icon: 'error',
                    title: 'Hapus data',
                    html: `Apakah data <b>${nama_barang}</b> akan dihapus?`,
                    confirmButtonText: 'Ya',
                    denyButtonText: 'Tidak',
                    showDenyButton: true,
                    focusConfirm: false
                  }).then((result) => {
                    if(result.isConfirmed) $(e.target).closest('form').submit()
                    else swal.close()
                  })
                  })
                })
                </script>

                 <script>
  $(document).ready(function(){
    $('#formBarangModal').on('show.bs.modal', function(e){
      let button = $(e.relatedTarget);
      let id = button.data('id');
      let nama = button.data('nama_barang');
      let kode = button.data('kode_barang');
      let produk = button.data('produk_id');
      let satuan = button.data('satuan');
      let harga = button.data('harga_jual');
      let stok = button.data('stok_barang');
      let ditarik = button.data('ditarik');
      let user = button.data('user_id');

      $('#nama_barang_edit').val(nama);
      $('#kode_barang_edit').val(kode);
      $('#produk_id_edit').val(produk);
      $('#satuan_edit').val(satuan);
      $('#harga_jual_edit').val(harga);
      $('#stok_barang_edit').val(stok);
      $('#ditarik_edit').val(ditarik);
      $('#user_id_edit').val(user);

      $('.form-edit').attr('action', `/barang/${id}`);
    });
  });
</script>



                  

                  

                  
                @endpush