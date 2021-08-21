<div class="sidebar">
            <div class="sidebar-brand">
                <h2><span><a href="/">PERMUT+</a></span></h2>
            </div>
            <div class="sidebar-menu">
                <ul>

                    <li class="text-danger {{ auth()->user()->unreadNotifications->count() > 0 ? 'text-danger':''}}">
                        <a href="{{route('notif')}}">
                            <span class="las la-bell">
                                <sup>
                                    @if(auth()->user()->unreadNotifications->count() > 0)
                                      + {{ auth()->user()->unreadNotifications->count() }}
                                    @endif
                                    </sup>
                            </span>
                            <span>Notifications</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('avis.index')}}">
                            <span class="las la-list-ul"></span>
                            <span>Liste des permutations</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('avis.create')}}">
                            <span class="las la-clipboard-check"></span>
                            <span>Faire une demande</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('profile')}}">
                            <span class="las la-user-circle"></span>
                            <span>Compte</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"onclick="event.preventDefault();
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
