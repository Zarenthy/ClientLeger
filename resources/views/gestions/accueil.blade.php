@extends('base')

@section('style')
    <style>
        .button-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px;
        }
        .button-container a {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #333;
        }
    </style>
@endsection

@section('content')
    <div class="button-container">
        <a href="{{ route('clients.showAll')  }}">
            <img src="{{ asset('image1.jpg') }}" alt="Gestion des clients" class="responsive-image" width="200" height="150">
            <div>Gestion des clients</div>
        </a>
        <a href="{{ route('employes.showAll')  }}">
            <img src="{{ asset('image1.jpg') }}" alt="Gestion des employes" class="responsive-image" width="200" height="150">
            <div>Gestion des employes</div>
        </a>
        <a href="{{ route('visites.index')  }}">
            <img src="{{ asset('business-card.jpg') }}" alt="Visites" class="responsive-image" width="200" height="150">
            <div>Rapport & Visite</div>
        </a>
    </div>
@endsection
