@extends('layouts.app', ['style'=>[]])

@section('dynamicPageTitle')
    Accueil
@stop

@section('content')
<div class="background">
    <div class="title">
        Avec PERMUT+, <br> Votre permutation devient plus facile
    </div>
    <div class="btn">
        <a href="{{ route('search') }}">COMMENCEZ MAINTENANT</a>
    </div>
</div>
@stop
