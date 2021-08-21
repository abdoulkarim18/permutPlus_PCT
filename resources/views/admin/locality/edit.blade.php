@extends('admin.layout.app')

@section('dynamicPageTitle')
Tableau de bord de Modification des localités
@stop


@section('content')
<div>
    <div id="formAct">
        <div id="form" class="form-border">
            <form action="{{ route('admin-localities.update', $locality->id) }}" class="form-horizontal" method="post">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="mb-3">Nom de la ville</label>
                    <div class="mb-4">
                        <input type="text" class="form-control" value="{{ old('name')?? $locality->name }}" id="name" name="name" required>
                    </div>
                </div>
                <button class="btn btn-light mr-auto">MODIFIER</button>
            </form>
        </div>
    </div>
</div>
@stop
