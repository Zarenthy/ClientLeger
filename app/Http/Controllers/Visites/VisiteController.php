<?php

namespace App\Http\Controllers\Visites;
use App\Models\Visite;
use App\Models\RapportDeVente;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VisiteController extends Controller
{
    public function showVisite() {
        $produits = Produit::all(); // Ajoutez ceci si nécessaire
        return view('visites.visite', compact('produits'));  // Assurez-vous que cette vue existe
    }

    public function index()
    {
        $visites = Visite::with('rapportDeVente')->get();
        $produits = Produit::all();
        //dd($visites);
        return view('visites.visite', compact('visites', 'produits'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'id_visite' => 'required|exists:visites,Id_Visite',
            'details' => 'required',
            'resultat' => 'required',
            'produit_id' => 'required|exists:produits,Id_Produit',
            'quantite' => 'required|integer'
        ]);

        $rapport = RapportDeVente::create([
            'Details' => $request->details,
            'Resultat' => $request->resultat
        ]);

        $visite = Visite::find($request->id_visite);
        $visite->Id_Rapport = $rapport->Id_Rapport;
        $visite->save();

        // Relation Produit-Rapport
        $rapport->produits()->attach($request->produit_id, ['Quantite' => $request->quantite]);

        return redirect()->back()->with('success', 'Rapport ajouté avec succès');
    }
    

}
