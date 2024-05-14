@extends('base')

@section('content')
    <div>Editer un employe</div>
    <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="{{route('employes.maj', ['employe' =>$employe])}}">
        @csrf
        @method('put')
        <div>
            <label>Nom</label>
            <input type="Nom" name="Nom" placeholder="Nom" value="{{$employe->nom}}">
        </div>
        <div>
            <label>Prenom</label>
            <input type="Prenom" name="Prenom" placeholder="Prenom" value="{{$employe->tel}}">
        </div>
        <div>
            <label>Mail</label>
            <input type="text" name="Mail" placeholder="Mail" value="{{$employe->Mail}}">
        </div>
        <div>
            <label>Departement</label>
            <input type="text" name="Departement" placeholder="Departement" value="{{$employe->Departement}}">
        </div>
        <div>
            <label>Id_Authentification_Roles</label>
            <input type="int" name="Id_Authentification_Roles" placeholder="Id_Authentification_Roles" value="{{$employe->Id_Authentification_Roles}}">
        </div>
        <div>
            <input type="submit" value="Editer un nouvel employe">
        </div>
    </form>
@endsection

