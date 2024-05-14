<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clients;
class ClientController extends Controller
{
    // Affiche tous les clients
    public function showAllClient(){
        $clients = Clients::all();
        return view('clients.showAll', ['clients' => $clients]);
    }

    public function create(){
        return view('clients.create');
    }

    // Enregistre un client
    public function store(Request $request){
        //dd($request->name); //renvoie le nom en mode debug
        $data = $request->validate([
            'Nom'=> 'required',
            'tel'=> 'required',
            'secteur'=> 'required',
            'ville'=> 'required',
        ]);

        $newClient = Clients::create($data);

        return redirect(route('clients.showAll'));
    }

    // Charge les données d'un client spécifique pour modification
    public function edit(Clients $client){
        //dd($client);
        return view('clients.edit', ['client'=>$client]);
    }

    // Met à jour les données d'un client et redirige l'utilisateur vers la liste clients
    public function maj(Clients $client, Request $request){
        //dd($client);
        $data = $request->validate([
            'Nom'=> 'required',
            'tel'=> 'required',
            'secteur'=> 'required',
            'ville'=> 'required',
        ]);

        $client->update($data);

        return redirect(route('clients.showAll'))->with('succes', 'Client mis a jour avec succes');
    }

    // Supprime un client
    public function delete(Clients $client){
        $client->delete();
        //dd($client);
        return redirect(route('clients.showAll'))->with('succes', 'Client supprimé avec succes');
    }

    // Affiche la page d'accueil
    public function returnToAccueil(){
        //dd($client);
        return view('gestion.accueil');
    }

    //cette métode est utilisé nulle part pour l'instant : ne pas oublier de l'implémenter
    public function returnToClientList(Clients $client){
        return view('gestions.accueil', ['client' => $client]);
    }
}
