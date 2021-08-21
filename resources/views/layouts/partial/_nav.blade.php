<nav>
    @guest
        <div><a href="{{ route('login') }}">CONNEXION</a></div>
        @if (Route::has('register'))
        <div><a href="{{ route('register') }}">INSCRIPTION</a></div>
        @endif
        <div class="close" id="close"><i class="las la-times"></i></div>
    @else
        <div><a href="{{ route('profile') }}">Mon Profil</a></div>
        <div>
            <a href="{{ route('logout') }}"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Deconnexion') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <div class="close" id="close"><i class="las la-times"></i></div>
    @endguest
</nav>