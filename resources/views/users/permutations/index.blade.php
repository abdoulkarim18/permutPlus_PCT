@extends('layouts.master')

@section('dynamicPageTitle')
Liste des Permutations
@stop
<style>
    .btn{
        background: red;
        border: none;
        cursor: pointer;
        padding: 2px 0px;
        margin-right: 4px;
        margin-top: 3px;
    }
    button:hover{
         color: red;
         border: none;
         background: #fff;
    }
</style>
@section('content')
<div>
    <main>
        <div>
            @include('message-flash')
        </div>
        <div class="container">
            <div class="permutation">
                <div class="permutation-group">
                    @foreach($permutations as $permutation)
                        @if($permutation->user->id == Auth::user()->id)
                            <div class="resultat">
                                <div class="locality"><b>IEP d'origine :</b> {{ $permutation->oiep }}</div>
                                <div class="school"><b>Ecole d'origine :</b> {{ $permutation->oschool }}</div>
                                <div class="locality"><b>IEP souhaitée :</b> {{ $permutation->siep }}</div>
                                <div><b>Nom :</b> {{ $permutation->user->nom }}</div>
                                <div><b>Prénom(s) :</b> {{ $permutation->user->prenoms }}</div>
                                <div><b>Email :</b > {{ $permutation->email}}</div>
                                <div><b>Contact :</b> {{ $permutation->phone}}</div>
                                <div><b>Publiée :</b> {{ $permutation->created_at}}</div>

                                <div class="bottom">
                                    <div class="button success"><a href="{{route('avis.edit', $permutation->id)}}">MODIFIER</a></div>
                                    <div class="button cancel">
                                    <form action="{{route('avis.destroy', $permutation->id)}}" method="post" style="display:inline-block;" onsubmit="return confirm('êtes vous sûr de bien vouloir supprimer cette permutation')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn">SUPPRIMER</button>
                                    </form>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

    </main>
</div>
@stop
