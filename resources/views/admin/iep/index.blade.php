@extends('admin.layout.app')

@section('dynamicPageTitle')
Tableau de bord Liste des IEP
@stop


@section('content')
<div>
    <div class="text-right mb-3 button success">
    <a class="btn btn-outline-primary" href="{{route('admin-ieps.create')}}">AJOUTER</a>
    </div>
    <table class="operations-table">
        <thead>
            <tr>
                <th>#</th>
                <th>DESIGNATION</th>
                <th>DREN</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ieps as $iep)
            <tr>
                <td class="text-center">{{ $iep->id}}</td>
                <td>{{ $iep->name}}</td>
                <td>{{ $iep->dren->name}}</td>
                <td>
                <div class="text-center mb-3">
                    <a class="btn btn-danger" href="{{route('admin-ieps.edit', $iep->id)}}">EDITER</a>
                    <form action="{{route('admin-ieps.destroy', $iep->id)}}" method="post" style="display:inline-block;" onsubmit="return confirm('êtes vous sûr de bien vouloir supprimer cette IEP?')">
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
        {{$ieps->links()}}
    </div>
</div>
@stop
