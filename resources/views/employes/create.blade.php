@extends('base')

@section('content')
    <div>Enregistrer un employé</div>
    <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="{{route('employes.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Nom</label>
            <input type="Nom" name="Nom" placeholder="Nom">
        </div>
        <div>
            <label>Prenom</label>
            <input type="Prenom" name="Prenom" placeholder="Prenom">
        </div>
        <div>
            <label>Mail</label>
            <input type="text" name="Mail" placeholder="Mail">
        </div>
        <div>
            <label>Departement</label>
            <input type="text" name="Departement" placeholder="Departement">
        </div>
        <div>
            <label>Id_Authentification_Roles</label>
            <input type="int" name="Id_Authentification_Roles" placeholder="Id_Authentification_Roles">
        </div>
        <div>
            <input type="submit" value="Editer un nouvel employe">
        </div>
    </form>
@endsection
