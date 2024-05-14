@extends('base')

@section('content')
    <div>
        <div>
            <a href="{{route('clients.create')}}">Créer un client</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Tel</th>
                <th>Secteur</th>
                <th>Ville</th>
                <th>Editer</th>
                <th>Supprimer</th>
            </tr>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->Id_Client}}</td>
                    <td>{{$client->Nom}}</td>
                    <td>{{$client->Tel}}</td>
                    <td>{{$client->Secteur}}</td>
                    <td>{{$client->Ville}}</td>
                    <td>
                        <a href="{{ route('clients.edit', ['client' => $client->Id_Client]) }}">Editer</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('clients.supprimer', ['client' => $client->Id_Client]) }}">
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
