@extends('admin.layout.app')

@section('dynamicPageTitle')
Tableau de bord Profil Administrateur
@stop


@section('content')
<div>
    <div id="form" class="form-border">
        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>Nom</strong></label>
            <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="" value="{{ Auth::user()->nom }}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>Prénoms</strong></label>
            <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="" value="{{ Auth::user()->prenoms }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>Matricule</strong></label>
            <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="" value="{{ Auth::user()->matricule }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>Contact</strong></label>
            <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="" value="{{ Auth::user()->contact }}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="land" class="mb4 col-sm-4"><strong>E-mail</strong></label>
            <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="" value="{{ Auth::user()->email}}" readonly>
            </div>
        </div>
    </div>
</div>
@stop