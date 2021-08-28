@extends('admin.layout.app')

@section('dynamicPageTitle')
    Tableau de bord Liste d'utilisateurs
@stop


@section('content')
<div>

    <table class="operations-table">
        <thead>
            <tr>
                <th>IEP d'origine</th>
                <th>IEP souhaitée</th>
                <th>Nom & Prénoms</th>
                <th>Date Publication </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permutations as $permutation)
                <tr>
                    <td>{{ $permutation->oiep}}</td>
                    <td>{{ $permutation->siep}}</td>
                    <td>{{ $permutation->user->nom }} {{ $permutation->user->prenoms }}</td>
                    <td>{{$permutation->created_at}}</td>
                    <td>
                        <div class="text-center mb-3">
                            <a class="btn btn-dark" href="{{route('admin-avis.show', $permutation->id)}}">VOIR</a>
                            <form action="{{route('admin-avis.destroy', $permutation->id)}}" method="post" style="display:inline-block;" onsubmit="return confirm('êtes vous sûr de bien vouloir supprimer cette école?')">
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
