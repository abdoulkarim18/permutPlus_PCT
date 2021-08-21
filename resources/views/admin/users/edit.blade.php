@extends('admin.layout.app')

@section('dynamicPageTitle')
Tableau de bord Enregistremenr des DREN
@stop


@section('content')
<div>
    <div id="formAct">
        <div id="form" class="form-border">
            <p>Accord de privilège</p>
            <form action="{{ route('admin-users.update', $user->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')

                <div class="form-group row">
                    <label for="land" class="mb4 col-sm-4"><strong>Nom</strong></label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="" value="{{ old('nom')?? $user->nom }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="land" class="mb4 col-sm-4"><strong>Prénoms</strong></label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="" value="{{ old('prenoms')?? $user->prenoms }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="land" class="mb4 col-sm-4"><strong>Matricule</strong></label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="" value="{{ old('matricule')?? $user->matricule }}" readonly>
                    </div>
                </div>
                <input type="hidden" name="userId" value="{{ old('userId')?? $user->id }}">
                <div class="form-group row">
                    <label for="land" class="mb4 col-sm-4"><strong>Contact</strong></label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="" value="{{ old('contact')?? $user->contact }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="land" class="mb4 col-sm-4"><strong>E-mail</strong></label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="" value="{{ old('email')?? $user->email }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="land" class="mb4 col-sm-5"><strong>Role</strong></label>
                    <div class="col-sm-7 form-check ">
                        <input type="checkbox" class="form-check-input" id="isAdmin" name="isAdmin" {{ $user->isAdmin ? 'checked' :'' }}>
                        <label for="isAdmin" class="form-check-label mb-3">Administrateur</label>
                    </div>
                </div>
               
                <button type="submit" class="btn btn-success mr-auto">VALIDER</button>
            </form>
        </div>
    </div>
</div>
@stop