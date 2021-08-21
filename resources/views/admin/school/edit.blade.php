@extends('admin.layout.app')

@section('dynamicPageTitle')
Tableau de bord Modification des Etablissements
@stop


@section('content')
<div>
    <div id="formAct">
        <div id="form" class="form-border">
            <form action="{{ route('admin-school.update', $school->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="mb-3">Etablissement</label>
                    <div class="mb-4">
                        <input type="text" class="form-control" value="{{ old('name')?? $school->name }}" id="name" name="name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="iep_id" class="mb-3">IEP</label>
                    <select name="iep_id" id="iep_id" class="form-control">
                        <option value="">Choisissez une IEP</option>
                        @foreach($ieps as $iep)
                        <option value="{{ $iep->id }}" {{ $iep->id==$school->iep_id ? 'selected':'' }}>{{ $iep->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary mr-auto">MODIFIER</button>
            </form>
        </div>
    </div>
</div>
@stop
