@extends('layouts.default')

@section('dynamicPageTitle')
Nouveau mot de passe - TEACHSWAP
@stop

@section('content')
<div>
    <header>
        <div class="logo">
            <a href="/">LOGO</a>
        </div>
        <div class="menu"><i class="las la-bars"></i></div>
    </header>

    <div class="animation">
        <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
            <div class="loginbackground box-background--white padding-top--64">
                <div class="loginbackground-gridContainer">
                    <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                        <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                        <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                        <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                        <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                        <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                        <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                        <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                        <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                        <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>

        <div class="form-container">
            <form action="{{ route('password_update') }}" method="post">
                @csrf
                @method('PUT')
                <!-- <div class="top">
                  CONNEXION
                </div> -->
                @if(session('message'))
                @if(session('success') == 'false')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('message')}} </strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @endif

                <div class="form-div">
                    <input type="password" name="old_pwd" placeholder="Ancien mot de passe" required>
                </div>
                <div class="form-div">
                    <input type="password" name="new_pwd" placeholder="Nouveau mot de passe" required>
                </div>
                <div class="form-div">
                    <input type="password" name="conf_pwd" placeholder="Confirmer le mot de passe" required>
                </div>
                <div class="form-div">
                    <button type="submit" class="form-button">MODIFIER</button>
                </div>

                <div class="bottom">
                    <a href="{{ route('profile') }}">Revenir en arrière</a>
                </div>

            </form>

        </div>


    </main>
</div>
@stop