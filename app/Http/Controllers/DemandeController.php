<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Demande;

use App\Adresse;

use App\Lang;

use App\Client;

use Session;

use App\Etat;

use Redirect;

use Illuminate\Support\Facades\Input;

use App\Http\Requests\CreateDemandeRequest;


class DemandeController extends Controller
{

//CreateDemande
  public function store(CreateDemandeRequest $request){

    $clients = Client::all();
    $demande = new Demande($request->all());
    $adresse = new Adresse($request->all());
    $langues = Lang::all();
    $adresse->save();
    $demande->etat()->associate(Etat::find(1));
    $demande->adresse_id = $adresse->id;
    $demande->save();
    return view('demandeform')->with(
      [
      'message' => 'Nouvelle demande a été ajoutée à la Base de données',
      'creerLe' => $demande->created_at,
      'titre'   => $demande->titre,
      'client' => $demande->client->nom.' '.$demande->client->prenom,
      'dateEvent' => $demande->dateEvent,
      'langues' => $langues,
      'clients' => $clients,
      'id' => $demande->id
      ]);
      //return $request->all();
  }

  public function edit($id){
    $langues = Lang::all();
    $demande = Demande::find($id);
    $etats = Etat::all();

    if(!is_null($demande)){
      return view('demandeEdit', 
        [
        'langues' => $langues,
        'demande' => $demande,
        'etats' => $etats
        ]);
    }
  }

  public function add(){
    $langues = Lang::all();
    $clients = Client::all();
    return view('demandeform', 
      [
      'langues' => $langues,
      'clients' => $clients      
      ]);
  }

  public function showAll(){
    $langues = Lang::all();
    $demandes = Demande::where('activation',1)->get();
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
      'dateEvent' => 'required',
      'dateEndEvent' => 'required'
      ]);

    $id = $request->id;
    $demande = Demande::find($id);

    if(Input::get('action')=="modifier") {
      if(!is_null($demande)){
        $demande->titre = $request->titre;
        $demande->content = $request->content;
        $demande->dateEvent = $request->dateEvent;
        $demande->dateEndEvent = $request->dateEndEvent;
        $demande->etat()->associate(Etat::find(4));
        $demande->activation=0;
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


  public function getByDate(Request $request){

   $this->validate($request, [
    'dateEventMin' => 'required_without_all:dateEventMax,dateCreationMin,dateCreationMax',
    'dateEventMax' => 'required_without_all:dateEventMin,dateCreationMin,dateCreationMax',
    'dateCreationMin' => 'required_without_all:dateEventMin,dateEventMax,dateCreationMax',
    'dateCreationMax' => 'required_without_all:dateEventMin,dateEventMax,dateCreationMin'
    ]);

   //return $request->dateEventMax;
   $langues = Lang::all();

   $size = 0;


   if(!empty($request->dateEventMax)){
    $demande = Demande::where('dateEvent', '<=', $request->dateEventMax); 
  }

  if(!empty($request->dateEventMin)){
    $demande = $demande->where('dateEvent', '>=', $request->dateEventMin);
  }

  if(!empty($request->dateCreationMax)){
    $demande = $demande->where('created_at', '<=', $request->dateCreationMax);
  }

  if(!empty($request->dateCreationMin)){
    $demande = $demande->where('created_at', '>=', $request->dateCreationMin);
  }

  $demande = $demande->get();

  if(empty($demande)){
    $demande = Demande::all();
  }else{
    $size = count($demande);
  }

  
  return view('demandes', 
    [
    'langues' => $langues,
    'demandes' => $demande,
    'size' => $size    
    ]);

  
}

public function remove($id){
  $demande = Demande::find($id);
  $demande->etat()->associate(Etat::find(4));
  $demande->activation = 0;
  $demande->save();
  return redirect()->back();
}

}
