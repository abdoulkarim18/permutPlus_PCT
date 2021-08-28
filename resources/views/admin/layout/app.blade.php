<!DOCTYPE html>
<html lang="fr">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('dynamicPageTitle') | PERMUT+</title>
        <!--LINK STYLE-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/styles/form.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/flash.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/admin-operations.css') }}">
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <!--ICON-->
        <link rel="icon" href="{% static 'website/assets/images/icon.png' %}">
        <!--LINK line awesome-->
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    </head>
    <body>
        <input type="checkbox" id="nav-toggle">

        @include('admin.layout.partial.sidebar')

        <div class="main-content">
            <!--header-->
            @include('admin.layout.partial.header')
            <main>
                <div>
                    <script src="//code.jquery.com/jquery.js"></script>
                    @include('flashy::message')
                    @include('message-flash')
                </div>
                @yield('content')
            </main>
        </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    @yield('script')
</html>
