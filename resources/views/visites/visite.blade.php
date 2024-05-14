@extends('base')

@section('content')
<div class="container">
    <h1>Gestion des Visites</h1>
    <form action="{{ route('visites.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_visite">Numéro de visite</label>
            <input type="text" class="form-control" id="id_visite" name="id_visite" required>
        </div>
        <div class="form-group">
            <label for="details">Détails</label>
            <textarea class="form-control" id="details" name="details" required></textarea>
        </div>
        <div class="form-group">
            <label for="resultat">Résultat</label>
            <textarea class="form-control" id="resultat" name="resultat" required></textarea>
        </div>
        <div class="form-group">
            <label for="produit_id">Produit</label>
            <select class="form-control" id="produit_id" name="produit_id">
                @foreach($produits as $produit)
                    <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantite">Quantité</label>
            <input type="number" class="form-control" id="quantite" name="quantite" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    <h2>Liste des Rapports de Visites</h2>
    <ul>
        @foreach($visites as $visite)
            <li>{{ $visite->objectif }} - {{ $visite->rapportDeVente->details }}</li>
        @endforeach
    </ul>
</div>
@endsection
