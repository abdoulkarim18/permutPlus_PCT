@extends('layouts.tsearch')

@section('dynamicPageTitle')
Page de recherche
@stop

@section('content')
<header>
    <div class="logo">
        <a href="/">PERMUT+</a>
    </div>
    <div class="menu"><i class="las la-bars"></i></div>
    <nav>
        <div title="Notification" class="text-danger {{ auth()->user()->unreadNotifications->count() > 0 ? 'text-danger':''}}">
            <a href="{{route('notif')}}">
                <span class="las la-bell"></span>
                <span>
                    <sup class="sup">
                        @if(auth()->user()->unreadNotifications->count() > 0)
                          + {{ auth()->user()->unreadNotifications->count() }}
                        @endif
                    </sup>
                </span>
            </a>
        </div>
        <div title="Profile"><a href="{{ route('profile')}}"><span class="las la-igloo"></span></a></div>
        <div><a title="Deconnexion" href="{{ route('logout') }}"><span class="las la-sign-out-alt" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"></span></a></div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        <!-- <div class="close" id="close"><i class="las la-times"></i></div> -->
    </nav>
</header>

<main>
    <div class="search-bar">

        <form action="{{ route('result') }}" class="search-form">
            <div class="select-search">
                <select name="dren" id="dren">
                    <option value="">Veuillez choisir une DREN</option>
                    @foreach($drens as $dren)
                        <option value="{{ $dren->name }}">{{ $dren->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="btn-search">
                <button type="submit">Rechercher</button>
            </div>
        </form>
    </div>
</main>
@stop
