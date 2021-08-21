@extends('admin.layout.app')

@section('dynamicPageTitle')
Tableau de bord Liste des localités
@stop


@section('content')
<div>
    <div class="text-right mb-3 button success">
    <a class="btn btn-outline-primary" href="{{route('admin-localities.create')}}">AJOUTER</a>
    </div>
    <table class="operations-table">
        <thead>
            <tr>
                <th>#</th>
                <th>DESIGNATION</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($localities as $locality)
            <tr>
                <td class="text-center">{{ $locality->id}}</td>
                <td>{{ $locality->name}}</td>
                <td>
                <div class="text-center mb-3">
                    <a class="btn btn-dark" href="{{route('admin-localities.edit', $locality->id)}}">EDITER</a>
                    <form action="{{route('admin-localities.destroy', $locality->id)}}" method="post" style="display:inline-block;" onsubmit="return confirm('êtes vous sûr de bien vouloir supprimer cette localité?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">SUPPRIMER</button>
                    </form>
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop