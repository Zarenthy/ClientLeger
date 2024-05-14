@extends('base')

@section('content')
    <div>
        <div>
            <a href="{{route('employes.create')}}">Créer un employe</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Mail</th>
                <th>Departement</th>
                <th>Id_Authentification_Roles</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
            @foreach($employes as $employe)
                <tr>
                    <td>{{$employe->Id_Employe}}</td>
                    <td>{{$employe->Nom}}</td>
                    <td>{{$employe->Prenom}}</td>
                    <td>{{$employe->Mail}}</td>
                    <td>{{$employe->Departement}}</td>
                    <td>{{$employe->Id_Authentification_Roles}}</td>

                    <td>
                        <a href="{{ route('employes.edit', ['employe' => $employe->Id_Employe]) }}">Editer</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('employes.supprimer', ['employe' => $employe->Id_Employe]) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
