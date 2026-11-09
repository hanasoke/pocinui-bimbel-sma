<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>POCINUI - Bootstrap 5</title>

    <!-- Bootstrap CSS External -->
    <link rel="stylesheet" 
          href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="alert alert-success">
                    Bootstrap 5 berhasil terhubung dengan Laravel 13! 
                </div>

                <div class="text-primary">
                    Selamat Datang di Laravel 13 
                </div>

                <button class="btn btn-primary my-2">
                    Klik Saya
                </button>
            </div>
        </div>

        <h1>Pocinui Bimbel khusus Anak SMA</h1>
    </div>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>