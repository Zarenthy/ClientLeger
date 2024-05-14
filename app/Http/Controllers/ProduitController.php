<?php

namespace App\Http\Controllers\Visites;
use App\Models\Visite;
use App\Models\RapportDeVente;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProduitController extends Controller
{
    public function index() {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    public function store(Request $request) {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            // autres champs nécessaires
        ]);

        $produit = new Produit($request->all());
        $produit->save();
        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès');
    }
    

}
