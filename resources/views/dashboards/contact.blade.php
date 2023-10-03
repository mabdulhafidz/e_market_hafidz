@extends('templates.layout')

@push('style')
    
@endpush

@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card bg-secondary">
            <div class="card-header text-center">
                <h3 class="card-title text-secondary">Contact</h3>
            </div>
            <div class="card-body">
                <p class="text-center">Welcome to our Contact page!</p>

                <h4 class="text-center">Contact Information:</h4>
                <p class="text-center"><strong>Address:</strong>  Jalan Kembung, Cianjur, Indonesia</p>
                <p class="text-center"><strong>Phone:</strong> +62-31231-2111</p>
                <p class="text-center"><strong>Email:</strong> ronasadfasfldowati@gmail.com</p>

                <h4 class="text-center">Contact Form:</h4>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary text-center">Send</button>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
                <a href="#" class="btn btn-primary"><i class="fab fa-instagram"></i></a>
                <a href="#" class="btn btn-primary"><i class="fab fa-twitter"></i></a>
                <a href="#" class="btn btn-primary"><i class="fab fa-whatsapp"></i></a>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
@endsection

@push('script')
    <script>

    </script>
@endpush
