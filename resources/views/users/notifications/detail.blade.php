@extends('layouts.default')

@section('dynamicPageTitle')
Detail
@stop

@section('content')
<div>
    <header>
        <div class="logo">
            <a href="/">PERMUT+</a>
        </div>
        <div class="menu"><i class="las la-bars"></i></div>
    </header>

    <main>

        <div class="container">
            @if($decision->isAccepted==2)
            <div class="form">
                <form>
                    <div class="row">
                        <label for="school">Nom & Prenoms</label>
                        <div class="text">{{ $apply->user->nom}} {{ $apply->user->prenoms }}</div>
                    </div>
                    <div class="row">
                        <label for="numero">Numéro</label>
                        <div class="text">{{ $apply->phone}}</div>
                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <div class="text">{{ $apply->email }}</div>
                    </div>
                    <div class="row">
                        <label for="land">IEP actuelle</label>
                        <div class="text">{{ $apply->oiep}}</div>
                    </div>
                    <input type="hidden" name="permutationId" id="$permutationId" value="{{ $apply->id }}">
                    <div class="row">
                        <label for="land">Ecole actuelle</label>
                        <div class="text">{{ $apply->oschool }}</div>
                    </div>

                    <div class="row-radio">
                        <div><label for="email">Décision :</label></div>
                        <input type="radio" name="decision" id="accepted" value="accepted" {{ $decision->isAccepted==1 ? 'checked': '' }}><label for="accepted">Accepter</label>
                        <input type="radio" name="decision" id="noAccepted" value="noAccepted" {{ $decision->isAccepted==2 ? 'checked': '' }}><label for="noAccepted">Refuser</label>
                    </div>
                    <div class="button">
                        <button ty class="cancel"><a href="{{ route('notif') }}">RETOUR</a></button>
                    </div>
                </form>
            </div>
            @else
            <div class="form">
                <form>
                    <div class="row">
                        <label for="school">Nom & Prenoms</label>
                        <div class="text">{{ $apply->user->nom}} {{ $apply->user->prenoms }}</div>
                    </div>
                    <div class="row">
                        <label for="numero">Numéro</label>
                        <div class="text">{{ $apply->phone}}</div>
                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <div class="text">{{ $apply->email }}</div>
                    </div>
                    <div class="row">
                        <label for="land">IEP actuelle</label>
                        <div class="text">{{ $apply->oiep}}</div>
                    </div>
                    <div class="row">
                        <label for="land">Ecole actuelle</label>
                        <div class="text">{{ $apply->oschool }}</div>
                    </div>

                    <div class="row-radio">
                        <div><label for="email">Décision :</label></div>
                        <input type="radio" name="decision" id="accepted" value="accepted" {{ $decision->isAccepted==1 ? 'checked': '' }}><label for="accepted">Accepter</label>
                        <input type="radio" name="decision" id="noAccepted" value="noAccepted" {{ $decision->isAccepted==2 ? 'checked': '' }}><label for="noAccepted">Refuser</label>
                    </div>
                    <div class="button">
                        <button class="success"><a href="{{ route('createPdf',$apply->id) }}">Imprimer ma Fiche de permutation</a></button>
                        <button ty class="cancel"><a href="{{ route('notif') }}">RETOUR</a></button>
                    </div>
                </form>
            </div>
            <div>

            </div>
            @endif
        </div>

    </main>
</div>
@stop
