@extends('layouts.master')

@section('dynamicPageTitle')
Profil utilisateur
@stop

@section('content')
<div>
    <main>
        <div>
            @include('message-flash')
        </div>
        <div class="account">
            <div class="form">
                <form action="" method="post">
                    <div class="row">
                        <label for="land"><strong>Nom</strong></label>
                        <input type="text" placeholder="" value="{{ Auth::user()->nom }}">
                    </div>
                    <div class="row">
                        <label for="land"><strong>Prénoms</strong></label>
                        <input type="text" placeholder="" value="{{ Auth::user()->prenoms }}">
                    </div>
                    <div class="row">
                        <label for="land"><strong>Matricule</strong></label>
                        <input type="text" placeholder="" value="{{ Auth::user()->matricule }}">
                    </div>
                    <div class="row">
                        <label for="land"><strong>Contact</strong></label>
                        <input type="text" placeholder="" value="{{ Auth::user()->contact }}">
                    </div>
                    <div class="row">
                        <label for="land"><strong>Email</strong></label>
                        <input type="email" placeholder="" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="change-password row"><a href="{{ route('password_update') }}">Changer de mot de passe</a></div>
                    <div class="button">
                        <button type="submit">Envoyer</button>
                        <div class="change-password row" style="display: inline-block;"><a href="{{ route('editUser', Auth::user()->id) }}">Modifier mon profil</a></div>
                    </div>
                </form>
            </div>
        </div>

    </main>
</div>
@stop