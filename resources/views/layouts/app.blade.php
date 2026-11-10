<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Homepage')</title>

        <!-- Bootstrap CSS External -->
        <link rel="stylesheet" 
                href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    </head>
    <body>

        @yield('content')

        <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>