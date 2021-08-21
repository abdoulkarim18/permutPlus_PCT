@extends('admin.layout.app')

@section('dynamicPageTitle')
Tableau de bord Modification des IEP
@stop


@section('content')
<div>
    <div id="formAct">
        <div id="form" class="form-border">
            <form action="{{ route('admin-ieps.update', $iep->id) }}" class="form-horizontal" method="post">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="mb-3">Inspection d'Enseignement Primaire</label>
                    <div class="mb-4">
                        <input type="text" class="form-control" value="{{ old('name')?? $iep->name }}" id="name" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dren_id" class="mb-3">DREN</label>
                    <select name="dren_id" id="oschool" class="form-control">
                        <option value="">Choisissez un établissement</option> 
                        @foreach($drens as $dren)
                        <option value="{{ $dren->id }}" {{ $dren->id==$iep->dren_id ? 'selected':'' }}>{{ $dren->name }}</option> 
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary mr-auto">MODIFIER</button>
            </form>
        </div>
    </div>
</div>
@stop
