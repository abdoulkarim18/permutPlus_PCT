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
        @if($response->isAccepted==0 || $response->isAccepted==2)
            <div class="form">
                <form action="{{ route('confirm',$apply->data['customRequestId']) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <label for="school">Nom & Prenoms</label>
                        <div class="text">{{ $apply->data['nom']}} {{ $apply->data['prenoms']}}</div>
                    </div>
                    <div class="row">
                        <label for="numero">Numéro</label>
                        <div class="text">{{ $apply->data['contact']}}</div>
                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <div class="text">{{ $apply->data['email']}}</div>
                    </div>

                    <div class="row">
                        <label for="olocalite">IEP actuelle</label>
                        <div class="text">{{ $apply->data['oiep']}}</div>
                    </div>
                    <div class="row">
                        <label for="school">Etablissement actuel</label>
                        <div class="text">{{ $apply->data['oschool']}}</div>
                    </div>
                        <input type="hidden" name="customRequestId" value="{{ $apply->data['customRequestId']}}" id="customRequestId">
                        <input type="hidden" name="userId" id="userId" value="{{ $apply->data['userId']}}">

                    <div class="row">
                        <label for="land">IEP souhaitée</label>
                        <div class="text">{{ $apply->data['siep']}}</div>
                    </div>

                    <div class="row-radio">
                        <div><label for="email">Décision :</label></div>
                        <input type="radio" name="decision" id="accepted" value="accepted" {{ $response->isAccepted==1 ? 'checked': '' }}><label for="accepted">Accepter</label>
                        <input type="radio" name="decision" id="noAccepted" value="noAccepted" {{ $response->isAccepted==2 ? 'checked': '' }}><label for="noAccepted">Refuser</label>
                    </div>
                    <div class="button">
                        @if($response->isAccepted==0)
                            <button type="submit" class="success">Valider</button>
                        @endif
                        <button class="cancel"><a href="{{ route('notif') }}">RETOUR</a></button>
                    </div>
                </form>
            </div>
        @else
        <div>
        <div class="form">
                <form >
                    <div class="row">
                        <label for="school">Nom & Prenoms</label>
                        <div class="text">{{ $apply->data['nom']}} {{ $apply->data['prenoms']}}</div>
                    </div>
                    <div class="row">
                        <label for="numero">Numéro</label>
                        <div class="text">{{ $apply->data['contact']}}</div>
                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <div class="text">{{ $apply->data['email']}}</div>
                    </div>

                    <div class="row">
                        <label for="olocalite">IEP actuelle</label>
                        <div class="text">{{ $apply->data['oiep']}}</div>
                    </div>
                    <div class="row">
                        <label for="school">Etablissement actuel</label>
                        <div class="text">{{ $apply->data['oschool']}}</div>
                    </div>
                        <input type="hidden" name="customRequestId" value="{{ $apply->data['customRequestId']}}" id="customRequestId">
                        <input type="hidden" name="userId" id="userId" value="{{ $apply->data['userId']}}">

                    <div class="row">
                        <label for="land">IEP souhaitée</label>
                        <div class="text">{{ $apply->data['siep']}}</div>
                    </div>

                    <div class="row-radio">
                        <div><label for="email">Décision :</label></div>
                        <input type="radio" name="decision" id="accepted" value="accepted" {{ $response->isAccepted==1 ? 'checked': '' }}><label for="accepted">Accepter</label>
                        <input type="radio" name="decision" id="noAccepted" value="noAccepted" {{ $response->isAccepted==2 ? 'checked': '' }}><label for="noAccepted">Refuser</label>
                    </div>
                    <div class="button">
                        <button class="success"><a href="{{ route('exportPdf', $apply->data['userId'] ) }}">Imprimer</a></button>
                        <button class="cancel"><a href="{{ route('notif') }}">Annuler</a></button>
                    </div>
                </form>
            </div>

        </div>
        @endif
        </div>

    </main>
</div>
@stop
