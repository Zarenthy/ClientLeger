@extends('base')

@section('content')
    <div>Enregistrer un client</div>
    <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="post" action="{{route('clients.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Nom</label>
            <input type="Nom" name="Nom" placeholder="Nom">
        </div>
        <div>
            <label>Tel</label>
            <input type="int" name="tel" placeholder="Telephone">
        </div>
        <div>
            <label>Secteur</label>
            <input type="text" name="secteur" placeholder="secteur">
        </div>
        <div>
            <label>Ville</label>
            <input type="text" name="ville" placeholder="ville">
        </div>
        <div>
            <input type="submit" value="Enregistrer un nouveau client">
        </div>
    </form>
@endsection
