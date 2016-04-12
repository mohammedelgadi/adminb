<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Demande;

use Session;

use Redirect;

class DemandeController extends Controller
{
    public function store(Request $request){

        //return $request->all();

    	$this->validate($request, [
         'titre' => 'required',
         'content' => 'required',
         'client_id' => 'required',
         'dateEvent' => 'required'
         ]);

      $demande = Demande::create($request->all());


      return view('demandeform')->with(
        [
            'message' => 'Nouvelle demande a été ajoutée à la Base de données',
            'creerLe' => $demande->created_at,
            'titre'   => $demande->titre,
            'client' => $demande->client->nom.' '.$demande->client->prenom,
            'dateEvent' => $demande->dateEvent

        ]);


      //return $request->all();
  }

  public function edit($id){
   $demande = Demande::find($id);
   return view('demandeEdit');
}
}
