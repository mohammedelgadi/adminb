<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Lang;

use App\Adresse;

use App\Interpreteur;

use App\Http\Requests\CreateInterpreteurRequest;

use App\Langinterpreteur;


class InterpreteurController extends Controller
{
	public function show(){

		$langues = Lang::all();

		return view('interpreteur', ['langues' => $langues]);

	}

	public function store(CreateInterpreteurRequest $request){

			$interpreteur 	= new Interpreteur($request->all());
			if(!empty($request->file('image'))){
				$imageName = $request->nom . '.' . 
				$request->file('image')->getClientOriginalExtension();
				$request->file('image')->move(
					base_path() . '/public/images/clients/', $imageName
					);
				$interpreteur->image =  $imageName;
			}
			$adresse = new Adresse($request->all());

			$adresse->save();
			$interpreteur->adresse_id = $adresse->id;
			$interpreteur->save();
			$langues = Lang::all();

			$langue1 = new Langinterpreteur();
			$langue1->langs_init_id = $request->langue_ini;
			$langue1->langs_dest_id = $request->langue_dest;
			$langue1->interpreteurs_id = $interpreteur->id;
			$langue1->save();

			if(!empty($request->langue_ini_1) && !empty($request->langue_ini_1)){
				$langue2 = new Langinterpreteur();
				$langue2->langs_init_id = $request->langue_ini_1;
				$langue2->langs_dest_id = $request->langue_dest_1;
				$langue2->interpreteurs_id = $interpreteur->id;
				$langue2->save();
			}

			if(!empty($request->langue_ini_2) && !empty($request->langue_ini_2)){
				$langue3 = new Langinterpreteur();
				$langue3->langs_init_id = $request->langue_ini_2;
				$langue3->langs_dest_id = $request->langue_dest_2;
				$langue3->interpreteurs_id = $interpreteur->id;
				$langue3->save();
			}


			return view('interpreteur', 
				[
				'message' 		=> 'Nouveau interpreteur a été ajouté à la Base de données',
				'interpreteur' 	=> $interpreteur,
				'langues' 		=> $langues
				]);
		}
	}
