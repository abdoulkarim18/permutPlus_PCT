<!--sidebar-->
<div class="sidebar">
    <div class="sidebar-brand">
        <h2><span><a href="/">PERMUT+</a></span></h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="{{ route('admin-drens.index') }}">
                    <span class="las la-list-ul"></span>
                    <span>Dren</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-ieps.index') }}">
                    <span class="las la-list-ul"></span>
                    <span>IEP</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin-school.index') }}">
                    <span class="las la-list-ul"></span>
                    <span>Etablissements</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin-users.index') }}">
                    <span class="las la-list-ul"></span>
                    <span>Liste des utilisateurs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-avis.index') }}">
                    <span class="las la-list-ul"></span>
                    <span>Liste des permutations</span>
                </a>
            </li>
            </li>
            <li>
                <a href="{{route('profile')}}">
                    <span class="las la-user-circle"></span>
                    <span>Compte</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <span class="las la-sign-out-alt"></span>
                    <span>Deconnexion</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            <!-- <li>
                <a href="">
                <span class="las la-user-circle"></span>
                <span>Compte</span>
                </a>
            </li> -->
        </ul>
    </div>
</div>
<!--end sidebar-->
