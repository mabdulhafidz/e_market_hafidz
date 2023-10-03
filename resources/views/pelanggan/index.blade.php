            @extends('templates.layout')

            @push('style')
                
            @endpush

            @section('content')
                <section class="content">

                <!-- Default box -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Pelanggan</h3>

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
                    <div class="mb-3">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormPelanggan">
                        Tambah Pelanggan
                      </button>
                      <a href="" class="btn btn-success" target="_blank">
                        Export XLS
                      </a>
                      <a href="" class="btn btn-primary" target="_blank">
                        Export PDF
                      </a>
                      <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#modalProdukImport">
                        Import 
                      </a>
                    </div>
                   
                      @include('pelanggan.data')
                      
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    Footer
                  </div>
                  <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            @include('pelanggan.form')
            @include('pelanggan.edit')
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
              $('#tbl-pelanggan').DataTable()

            // dialog hapus data
            $('.btn-delete').on('click', function(e){  
              let nama_pelanggan = $(this).closest('tr').find('td:eq(0)').text();
              Swal.fire({
                icon: 'error',
                title: 'Hapus data',
                html: `Apakah data <b>${nama_pelanggan}</b> akan dihapus?`,
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
 $(document).ready(function() {
    $('#formPelangganModal').on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);
        let id = button.data('id');
        let nama = button.data('nama_pelanggan');
        let kode = button.data('kode_pelanggan');
        let noTelp = button.data('no_telp');
        let alamat = button.data('alamat');
        let email = button.data('email');
        
        // Bersihkan formulir dari data lama
        $('#nama_pelanggan_edit').val('');
        $('#kode_pelanggan_edit').val('');
        $('#no_telp_edit').val('');
        $('#alamat_edit').val('');
        $('#email_edit').val('');
        
        // Set data baru ke formulir (tanpa memerlukan validasi)
        $('#nama_pelanggan_edit').val(nama);
        $('#kode_pelanggan_edit').val(kode);
        $('#no_telp_edit').val(noTelp);
        $('#alamat_edit').val(alamat);
        $('#email_edit').val(email);
        
        // Atur action form untuk mengarah ke rute yang sesuai
        $('.form-edit').attr('action', `/pelanggan/${id}`);
    });
});

            </script>

            @endpush