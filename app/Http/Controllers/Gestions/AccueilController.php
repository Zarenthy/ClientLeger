<?php

namespace App\Http\Controllers\Gestions;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clients;
class AccueilController extends Controller
{
    public function returnToAccueil(){
        //dd($client);
        return view('gestions.accueil');
    }
}
