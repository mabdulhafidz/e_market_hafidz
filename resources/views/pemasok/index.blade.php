@extends('templates.layout')

@push('style')
    
@endpush

@section('content')
    <section class="content">

    <!-- Default box -->
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Pemasok</h3>

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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormPemasok">
            Tambah Pemasok
        </button>
        @include('pemasok.data')
        
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
    </div>
    <!-- /.card -->
@include('pemasok.form')
@include('pemasok.edit')
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
$('#tbl-pemasok').DataTable()

// dialog hapus data
$('.btn-delete').on('click', function(e){  
let nama_pemasok = $(this).closest('tr').find('td:eq(0)').text();
Swal.fire({
    icon: 'error',
    title: 'Hapus data',
    html: `Apakah data <b>${nama_pemasok}</b> akan dihapus?`,
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

$('#formPemasokModal').on('show.bs.modal', function(e){
    let button = $(e.relatedTarget)
    let id = button.data('id')
    let nama = button.data('nama_pemasok')
    $('#nama_pemasok_edit').val(nama)
    $('.form-edit').attr('action',`pemasok/${id}`)
})
})
</script>

@endpush