<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Demande;

use App\Adresse;

use App\Lang;

use Session;

use App\Etat;

use Redirect;

use Illuminate\Support\Facades\Input;

use App\Http\Requests\CreateDemandeRequest;


class DemandeController extends Controller
{

//CreateDemande
  public function store(CreateDemandeRequest $request){

    $demande = new Demande($request->all());
    $adresse = new Adresse($request->all());
    $demande->etat()->associate(Etat::find(1));
    $langues = Lang::all();
    $adresse->save();
    $demande->adresse_id = $adresse->id;
    $demande->save();
    return view('demandeform')->with(
      [
      'message' => 'Nouvelle demande a été ajoutée à la Base de données',
      'creerLe' => $demande->created_at,
      'titre'   => $demande->titre,
      'client' => $demande->client->nom.' '.$demande->client->prenom,
      'dateEvent' => $demande->dateEvent,
      'langues' => $langues
      ]);
      //return $request->all();
  }

  public function edit($id){
    $langues = Lang::all();
    $demande = Demande::find($id);

    if(!is_null($demande)){
      return view('demandeEdit', 
        [
        'langues' => $langues,
        'demande' => $demande
        ]);
    }

    
  }

  public function add(){
    $langues = Lang::all();
    return view('demandeform', 
      [
      'langues' => $langues      
      ]);
  }

  public function showAll(){
    $langues = Lang::all();
    $demandes = Demande::all();
    return view('demandes', 
      [
      'langues' => $langues,
      'demandes' => $demandes
      ]);
  }


  public function update(Request $request){

    $this->validate($request, [
      'titre' => 'required',
      'content' => 'required',
      'dateEvent' => 'required'
      ]);

    $id = $request->id;
    $demande = Demande::find($id);

    if(Input::get('action')=="modifier") {
      if(!is_null($demande)){
        $demande->titre = $request->titre;
        $demande->content = $request->content;
        $demande->dateEvent = $request->dateEvent;
        $demande->save();
      }

    }elseif(Input::get('action')=="supprimer"){

      if(!is_null($demande)){
        $demande->delete();
      }

      return redirect()->action('DemandeController@add');
    }

    return redirect()->action("DemandeController@edit",[$demande->id]);

  }

}
