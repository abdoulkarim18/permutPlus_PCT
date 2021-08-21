@extends('admin.layout.app')

@section('dynamicPageTitle')
Tableau de bord Détail Permutation
@stop


@section('content')
<div>
    <div class="text-right mb-3 button success">
        <a class="btn btn-outline-info" href="{{route('admin-avis.index')}}">Revenir à la liste</a>
    </div>
    <div id="form" class="form-border">
        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>DREN d'origine</strong></label>
            <div class="col-sm-8">
                <span>{{ $permutation->odren}}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>IEP d'origine</strong></label>
            <div class="col-sm-8">
                <span>{{ $permutation->oiep}}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>Ecole d'origine</strong></label>
            <div class="col-sm-8">
                <span>{{ $permutation->oschool}}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>DREN souhaitée</strong></label>
            <div class="col-sm-8">
                <span>{{ $permutation->sdren}}</span>
            </div>
        </div>

        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>IEP souhaitée</strong></label>
            <div class="col-sm-8">
                <span>{{ $permutation->siep}}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>Ecole souhaitée</strong></label>
            <div class="col-sm-8">
                <span>{{ $permutation->sschool}}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>Nom & Prenoms</strong></label>
            <div class="col-sm-8">
                <span>{{ $permutation->user->nom }} {{ $permutation->user->prenoms }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>E-mail</strong></label>
            <div class="col-sm-8">
                <span>{{ $permutation->user->email }} </span>
            </div>
        </div>
        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>Téléphones</strong></label>
            <div class="col-sm-8">
                <span>{{ $permutation->user->contact }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>Statut</strong></label>
            <div class="col-sm-8">
                <span class="text-danger">
                     @if($permutation->isAccepted==0)
                        <strong>En attente</strong>
                    @elseif($permutation->isAccepted==1)
                        <strong>Accepter</strong>
                    @else 
                        <strong>Refuser</strong>
                    @endif
                </span>
            </div>
        </div>

       
    </div>
    @if($responses->count()>0)
    <table class="operations-table mt-3">
        <thead>
            <tr>
                <th>IEP d'origine</th>
                <th>Ecole d'origine</th>
                <th>IEP souhaitée</th>
                <th>Ecole souhaitée</th>
                <th>Nom & Prénoms</th>
                <th>E-mail</th>
                <th>Contact</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($responses as $response)
                <tr>
                    <td>{{ $response->oiep}}</td>
                    <td>{{ $response->oschool}}</td>
                    <td>{{ $response->siep}}</td>
                    <td>{{ $response->sschool}}</td>
                    <td>{{ $response->user->nom }} {{ $response->user->prenoms }}</td>
                    <td>{{ $response->user->email}}</td>
                    <td>{{ $response->user->contact}}</td>
                    <td class="text-danger">
                        @if($response->isAccepted==0)
                            <strong>En attente</strong>
                        @elseif($response->isAccepted==1)
                            <strong>Accepter</strong>
                        @else 
                            <strong>Refuser</strong>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@stop