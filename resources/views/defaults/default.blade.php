<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PCT</title>
        <link rel="stylesheet" href="{{ asset('./assets/styles/main.css') }}">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
       
        @livewireStyles
    </head>
    <body>
        <header>
            <div class="logo">
                <a href="/">LOGO</a>
            </div>
            <div class="menu"><i class="las la-bars"></i></div>
            <nav>
                <div><a href="login.html">CONNEXION</a></div>
                <div><a href="signin.html">INSCRIPTION</a></div>
                <div class="close" id="close"><i class="las la-times"></i></div>
            </nav>
        </header>
        {{$slot}}
        @livewireScripts
    </body>
</html>
