@extends('admin.layout.app')

@section('dynamicPageTitle')
Tableau de bord Liste des DRENs
@stop


@section('content')
<div>
    <div class="text-right mb-3 button success">
    <a class="btn btn-outline-primary" href="{{route('admin-drens.create')}}">AJOUTER</a>
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
            @foreach($drens as $dren)
            <tr>
                <td class="text-center">{{ $dren->id}}</td>
                <td>{{ $dren->name}}</td>
                <td>
                
                <div class="text-center mb-3">
                    <a class="btn btn-dark" href="{{route('admin-drens.edit', $dren->id)}}">EDITER</a>
                    <form action="{{route('admin-drens.destroy', $dren->id)}}" method="post" style="display:inline-block;" onsubmit="return confirm('ëtes vous sûr de bien vouloir supprimer cette permutation')">
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