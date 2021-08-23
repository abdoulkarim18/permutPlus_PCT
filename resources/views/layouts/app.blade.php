<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('dynamicPageTitle') | PERMUT+</title>
        <link rel="stylesheet" href="{{ asset('assets/styles/main.css') }}">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('assets/styles/form.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/animation.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/flash.css') }}">
        <script src="{{ asset('assets/scripts/main.js') }}" async></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body>
        <header>
            <div class="logo">
                <a href="{{ route('accueil') }}">PERMUT+</a>
            </div>
            <div class="menu"><i class="las la-bars"></i></div>
            @include('layouts.partial._nav')
        </header>
        <main>
            <div>
                @include('message-flash')
            </div>
            @yield('content')
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>
            function Afficher()
            {
            var input = document.getElementById("motdepasse");
            if (input.type === "password")
            {
            input.type = "text";
            }
            else
            {
            input.type = "password";
            }
            }
        </script>
    </body>
</html>
