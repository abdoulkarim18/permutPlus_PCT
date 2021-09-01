<header>
    <h2>
        <label for="nav-toggle">
            <span class="las la-bars"></span>
        </label>
        <span class="dash">Tableau de bord</span>
    </h2>

    <div class="user-wrapper">
        <div>
            <h4>{{ Auth::user()->nom }} {{ Auth::user()->prenoms }}</h4>
        </div>
    </div>
    <button class="search-wrapper">
        <a href="{{ route('search') }}" title="Rechercher un Avis de permutation"><span class="las la-search"></span></a>
    </button>
</header>
