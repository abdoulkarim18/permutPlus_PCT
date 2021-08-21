@extends('admin.layout.app')

@section('dynamicPageTitle')
Tableau de bord Modification des DREN
@stop


@section('content')
<div>
    <div id="formAct">
        <div id="form" class="form-border">
            <form action="{{ route('admin-drens.update', $dren->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="mb-3">DREN</label>
                    <div class="mb-4">
                        <input type="text" class="form-control" value="{{ old('name')?? $dren->name }}" id="name" name="name" required>
                    </div>
                </div>
                <button class="btn btn-primary mr-auto">MODIFIER</button>
            </form>
        </div>
    </div>
</div>
@stop
