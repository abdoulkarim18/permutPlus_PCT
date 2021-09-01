@extends('layouts.tresult')

@section('dynamicPageTitle')
Résultats
@stop

@section('content')
<header>
    <div class="logo">
        <a href="/">PERMUT+</a>
    </div>
    <div class="menu"><i class="las la-bars"></i></div>
    @if(!Auth::user()->isAdmin)
    <nav>
        <div title="Notification" class="text-danger {{ auth()->user()->unreadNotifications->count() > 0 ? 'text-danger':''}}">
            <a href="{{route('notif')}}">
                <span class="las la-bell">
                    <sup>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                      + {{ auth()->user()->unreadNotifications->count() }}
                    @endif
                    </sup>
                </span>
                <span>
                </span>
            </a>
        </div>
        <div title="Profile"><a href="{{route('avis.index')}}"><span class="las la-igloo"></span></a></div>
        <div title="Deconnection"><a href="{{ route('logout') }}"><span class="las la-sign-out-alt" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"></span></a></div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        <!-- <div class="close" id="close"><i class="las la-times"></i></div> -->
    </nav>
    @endif
</header>

<main>
    <div class="search-bar">

        <form action="{{ route('resultIep') }}" class="search-form">
            <div class="select-search">
                <select name="iep" id="iep">
                    <option value="">Veuillez filtrer par IEP</option>
                    @foreach($ieps as $iep)
                    <option value="{{ $iep->name }}">{{ $iep->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="btn-search">
                <button type="submit">Rechercher</button>
            </div>
        </form>
    </div>
    <div>
        <script src="//code.jquery.com/jquery.js"></script>
        @include('flashy::users.message')
    </div>
@if(count($results) != 0)
    <div class="resultats">
        <div class="resultats-group">
        @foreach($results as $result)
            @if($result->user->id != Auth::user()->id)

            <div class="resultat">
                <div class="odren"><b>IEP d'origine :</b> {{ $result->oiep }}</div>
                <div class="school"><b>Ecole d'origine :</b>  {{ $result->oschool }}</div>
                <div class="siep"><b>IEP souhaitée :</b> {{ $result->siep }}</div>
                <div><b>Nom :</b>{{ $result->user->nom }}</div>
                <div><b>Prénom(s) :</b>{{ $result->user->prenoms }}</div>
                <div><b>Email : </b>{{ $result->email }}</div>
                <div><b>Contact : </b>{{ $result->phone }}</div>
                <div><b>Publiée : </b>{{ $result->created_at }}</div>
                @if(!Auth::user()->isAdmin)
                <div class="button"><a href="{{ route('apply', $result->id) }}">POSTULER</a></div>
                @endif
            </div>
            @endif
        @endforeach
        </div>
    </div>
@else
    <div class="info" style="color: red">
        Pas de résultat correspondant à votre recherche
    </div>
@endif
@if(!Auth::user()->isAdmin)
    <div class="bottom">
        <div class="button"><a href="{{ route('avis.create') }}">FAIRE UNE DEMANDE</a></div>
    </div>
@endif
</main>
@stop
