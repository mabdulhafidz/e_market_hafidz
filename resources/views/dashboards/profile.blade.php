@extends('templates.layout')

@push('style')
    
@endpush

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card bg-secondary text-primary">
            <div class="card-header">
                <h3 class="card-title">Profile</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body text-center">
                <h4>Welcome to Your Profile!</h4>
                <p>This is your profile page where you can view and edit your information.</p>

                <h4>About Us:</h4>
                <p>We are a leading website that provides valuable information to our users.</p>
                <p>Our mission is to deliver high-quality content and services.</p>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
@endsection

@push('script')
    <script>
       // Tidak ada skrip tambahan yang diperlukan untuk tampilan profil ini.
    </script>
@endpush
