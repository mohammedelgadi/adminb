<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Interpreteur;
use App\Service;
use App\Devie;

class DevisController extends Controller
{
	public function store(Request $request){

		$this->validate($request, [
			'interpreteur_id' 		=> 'required',
			'demande_id'			=> 'required',
			'service0' 				=> 'required',
			'designation0' 			=> 'required',
			'qte0' 					=> 'required',
			'prixUnitaire0' 		=> 'required'
			]);

		//return $request->all();

		$listServices = array(); 

		foreach (request()->all() as $key => $value){
			$index = 0;
			if(preg_match("/service[0-9]/",$key)){
				$service = new Service();
				$index = substr($key, 7);
				$service->service 		= $request["service".$index];
				$service->designation	= $request["designation".$index];
				$service->qantite 		= $request["qte".$index];
				$service->Unite = $request["unite".$index];
				$service->prix 	= $request["prixUnitaire".$index];
				$service->total = $request["qte".$index] * $request["prixUnitaire".$index];
				$listServices[] = $service;	
			}
		}

		if(!empty($listServices)){
			$devis = new Devie();
			$devis->demande_id = $request->demande_id;
			$devis->interpreteur_id = $request->interpreteur_id;
			$devis->save();
			foreach ($listServices as $value) {
				$devis->services()->save($value);
			}
		}

		print_r($listServices);
	}

	public function devis($id){
		$interpreteurs = Interpreteur::all();
		return view('devisform',
			[
			'interpreteurs' => $interpreteurs,
			'demande' => $id
			]);
	}

	public function edit(){
		return view('devis');
	}

	public function update($id){

	}
}