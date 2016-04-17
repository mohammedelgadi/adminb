<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Lang;

use App\Adresse;

use App\Interpreteur;

use App\Http\Requests\CreateInterpreteurRequest;


class InterpreteurController extends Controller
{
	public function show(){

		$langues = Lang::all();

		return view('interpreteur', ['langues' => $langues]);

	}

	public function store(CreateInterpreteurRequest $request){

		/*$this->validate($request, [
			'nom' 			=> 'required',
			'prenom' 		=> 'required',
			'email' 		=> 'required|email|unique:interpreteurs,email',
			'langue_ini' 	=> 'required',
			'langue_dest' 	=> 'required',
			'code_postal' 	=> 'required',
			'ville' 		=> 'required',
			'pays'			=> 'required'
			]);
		*/
		$interpreteur 	= new Interpreteur($request->all());
		if(!empty($request->file('image'))){
			$imageName = $request->nom . '.' . 
			$request->file('image')->getClientOriginalExtension();
			$request->file('image')->move(
				base_path() . '/public/images/clients/', $imageName
			);
			$interpreteur->image =  $imageName;
		}
		$adresse 	 	= new Adresse($request->all());
		$adresse->save();
		$interpreteur->adresse_id = $adresse->id;
		$interpreteur->save();
		$langues = Lang::all();

		return view('interpreteur', 
		[
			'message' 		=> 'Nouveau interpreteur a été ajouté à la Base de données',
			'interpreteur' 	=> $interpreteur,
			'langues' 		=> $langues
		]);
	}
}
