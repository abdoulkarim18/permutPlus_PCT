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
                <form action="{{ route('editUser', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <label for="nom"><strong>Nom</strong></label>
                        <input type="text" name="nom" placeholder="DUPONT" value="{{ $user->nom }}" required>
                    </div>
                    <div class="row">
                        <label for="prenoms"><strong>Prénoms</strong></label>
                        <input type="text" name="prenoms" placeholder="Jean" value="{{ $user->prenoms }}" required>
                    </div>
                    <div class="row">
                        <label for="nom_fille"><strong>Nom de Jeune Fille</strong></label>
                        <input type="text" name="nom_fille" placeholder="Bamba Mariam" value="{{ $user->nom_fille }}">
                    </div>
                    <div class="row">
                        <label for="contact"><strong>Contact</strong></label>
                        <input type="text" name="contact" placeholder="07 00 00 00 00" value="{{ $user->contact }}" required>
                    </div>
                    <div class="row">
                        <label for="emploi"><strong>Emploi</strong></label>
                        <input type="text" name="emploi" placeholder="Instituteur" value="{{ $user->emploi }}" required>
                    </div>
                    <div class="row">
                        <label for="email"><strong>Email</strong></label>
                        <input type="email" name="email" placeholder="exemple@exemple.com" value="{{ $user->email }}" required>
                    </div>
                    <div class="row">
                        <label for="datenaiss"><strong>Date de Naissance</strong></label>
                        <input type="date" name="datenaiss" value="{{ $user->datenaiss }}" placeholder="JJ/MM/AAAA" required>
                    </div>

                    <div class="row">
                        <label for="fonction"><strong>Fonction</strong></label>
                        <input type="text" name="fonction" value="{{ $user->fonction }}" name="fonction">
                    </div>

                    <div class="button">
                        <button type="submit" class="success">Modifier</button>
                        <button class="back" style="background: red;border:none"><a class="back" href="{{ route('profile') }}">Annuler</a></button>
                    </div>
                </form>
            </div>
        </div>

    </main>
</div>
@stop
