<?php

namespace App\Http\Controllers\Employes;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employes;
class EmployeController extends Controller
{
    /*public function index(): View{
        User::create([
            'name' => 'Jhon',
            'email' => 'john@doe.fr',
            'password' => Hash::make('0000')
        ]);
    }*/

    public function showAllEmploye(){
        $employes = Employes::all();
        return view('employes.showAll', ['employes' => $employes]);
    }

    public function create(){
        return view('employes.create');
    }

    public function store(Request $request){
        //dd($request->name); //renvoie le nom en mode debug
        $data = $request->validate([
            'Nom'=> 'required',
            'Prenom'=> 'required',
            'Mail'=> 'required',
            'Departement'=> 'required',
            'Id_Authentification_Roles'=> 'required',
        ]);

        $newEmploye = Employes::create($data);

        return redirect(route('employes.showAll'));
    }

    public function edit(Employes $employe){
        //dd($client);
        return view('employes.edit', ['employe'=>$employe]);
    }

    public function maj(Employes $employe, Request $request){
        //dd($employe);
        $data = $request->validate([
            'Nom'=> 'required',
            'Prenom'=> 'required',
            'Mail'=> 'required',
            'Departement'=> 'required',
            'Id_Authentification_Roles'=> 'required',
        ]);

        $employe->update($data);

        return redirect(route('employes.showAll'))->with('succes', 'Employe mis a jour avec succes');
    }

    public function delete(Employes $employe){
        $employe->delete();
        //dd($employe);
        return redirect(route('employes.showAll'))->with('succes', 'Employé supprimé avec succes');
    }

    public function returnToAccueil(){
        //dd($employe);
        return view('gestion.accueil');
    }

    //cette métode est utilisé nulle part pour l'instant : ne pas oublier de l'implémenter
    public function returnToEmployeList(Employes $employe){
        return view('gestions.accueil', ['employe' => $employe]);
    }
}
