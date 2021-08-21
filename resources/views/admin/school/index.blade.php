@extends('admin.layout.app')

@section('dynamicPageTitle')
Tableau de bord Liste des IEP
@stop


@section('content')
<div>
    <div class="text-right mb-3 button success">
    <a class="btn btn-outline-primary" href="{{route('admin-school.create')}}">AJOUTER</a>
    </div>
    <table class="operations-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Etablissement</th>
                <th>IEP</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schools as $school)
            <tr>
                <td class="text-center">{{ $school->id}}</td>
                <td>{{ $school->name}}</td>
                <td>{{ $school->iep->name}}</td>
                <td>
                <div class="text-center mb-3">
                    <a class="btn btn-dark" href="{{route('admin-school.edit', $school->id)}}">EDITER</a>
                    <form action="{{route('admin-school.destroy', $school->id)}}" method="post" style="display:inline-block;" onsubmit="return confirm('êtes vous sûr de bien vouloir supprimer cette école?')">
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
    <div class="mt-5">
        {{$schools->links()}}
    </div>
</div>
@stop
