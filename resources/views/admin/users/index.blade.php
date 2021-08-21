@extends('admin.layout.app')

@section('dynamicPageTitle')
    Tableau de bord Liste d'utilisateurs
@stop


@section('content')
<div>

    <table class="operations-table">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom & Prénoms</th>
                <th>E-mail</th>
                <th>Contact</th>
                <th>rôle</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->matricule }}</td>
                    <td>{{ $user->nom}} {{ $user->prenoms }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->contact }}</td>
                    <td>
                        {{ $user->isAdmin ? 'Admin' :'' }}
                    </td>
                    <td>
                    <div class="text-center mb-3 button success">
                    <a class="btn btn-dark" href="{{route('admin-users.edit', $user->id)}}">MODIFIER</a>
                    <form action="{{route('admin-users.destroy', $user->id)}}" method="post" style="display:inline-block;" onsubmit="return confirm('êtes vous sûr de bien vouloir supprimer cette école?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2">SUPPRIMER</button>
                    </form>
                </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
