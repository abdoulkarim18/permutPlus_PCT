<!DOCTYPE html>
<html lang="fr">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('dynamicPageTitle') | PERMUT+</title>
        <!--LINK STYLE-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/avis.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/apply.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/account.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/flash.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/permutations.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/notifications.css') }}">

        <!--ICON-->
        <link rel="icon" href="{% static 'website/assets/images/icon.png' %}">

        <!--LINK line awesome-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>
    <body>
        <input type="checkbox" id="nav-toggle">

        <!--sidebar-->
       @include('layouts.partial.sidebar')

        <div class="main-content">
            <!--header-->
            @include('layouts.partial.header')
            <!--end header-->
            @yield('content')
        </div>

        {# <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script> #}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            @yield('script')

    </body>
</html>
