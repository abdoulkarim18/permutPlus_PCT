<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('dynamicPageTitle') | PERMUT+</title>
        <link rel="stylesheet" href="{{ asset('assets/styles/form.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/animation.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/flash.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/apply.css') }}">
    </head>
    <body>
        <div>
             @yield('content')
        </div>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            @yield('script')
    </body>
</html>
