<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('dynamicPageTitle') - PERMUT+</title>
        <link rel="stylesheet" href="{{ asset('assets/styles/resultats.css') }}">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <script src="{{ asset('assets/scripts/main.js') }}" async></script>
    </head>
    <body>
       @yield('content')
    </body>
</html>
