<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Fedeisas\LaravelMailCssInliner\CssInlinerPlugin;

use App\Interpreteur;
use App\Service;
use App\Devie;
use Mail;
use Mailman;
use Validator;
use Redirect;
use Auth;
use App\Demande;
use App\Etat;
use DB;

class DevisController extends Controller
{
	public function store(Request $request){

		$validator = Validator::make($request->all(),
			[
			'interpreteur_id' 		=> 'required',
			'demande_id'			=> 'required',
			'service0' 				=> 'required',
			'designation0' 			=> 'required',
			'qte0' 					=> 'required',
			'prixUnitaire0' 		=> 'required'
			]
			);

		$listServices = array(); 
		$total = 0;
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
				$total= $total + $service->total;
				$listServices[] = $service;	
			}
		}

		if($validator->fails()){		
			return redirect()->back()->with(
				['errors'=>$validator->errors(),
				'services'=> $listServices,
				'total' => $total]);
		}

		
		try {
			
			DB::beginTransaction();

			if(!empty($listServices)){
				$devis = new Devie();
				$devis->demande_id = $request->demande_id;
				$devis->interpreteur_id = $request->interpreteur_id;
				$devis->total = $total;
				$devis->save();

				$demande = Demande::find($request->demande_id);
				if($demande->etat_id != 2){
					$demande->etat()->associate(Etat::find(2));
					$demande->save();
				}

				foreach ($listServices as $value) {
					$devis->services()->save($value);
				}



				Mailman::make('devis', array('devis' => $devis))->embed('images/logo.png')->from('mohelgadi@gmail.com')->to('mohelgadi@gmail.com')->subject('New quotation has been created')->setCss('public/css/style_df.css')->send();

				DB::commit();
				return redirect()->action('DevisController@edit', [$devis->id]);
			}

		}catch(\Exception $e){
			DB::rollback();
		}
		
		return back('devisform',[$request->demande_id]);
	}

	public function devisAdd($id){
		$interpreteurs = Interpreteur::all();
		return view('devisform',
			[
			'interpreteurs' => $interpreteurs,
			'demande' => Demande::find($id)
			]);
	}

	public function edit($id){
		$devis = Devie::find($id);
		return view('devis')->with(
			[
			'devis' => $devis,
			'show' => "true"
			]);
	}


	public function devis(){
		$devis = Devie::join('demandes', 'demandes.id', '=', 'devies.demande_id')->where('demandes.activation',1)->get();
		return view('pages/devis/devis',
			[
			'devis' => $devis
			]);
	}

	public function update($id){
		$devis =Devie::find($id);	
		return view('pages/devis/devisUpdate',
			[
			'devis' => $devis
			]);
	}

	public function remove($id){
		$devis =Devie::find($id);
		if(!empty($devis->facture())){
			$devis->activation = 0;
			$devis->save();
		}
		return redirect()->back();
	}

	public function valider($id){

		try{
			$devis =Devie::find($id);
			$facture = $devis->facturer();
			Mailman::make('facture', array('facture' => $facture))->embed('images/logo.png')->from('mohelgadi@gmail.com')->to('mohelgadi@gmail.com')->subject('New invoice has been created')->setCss('public/css/style_df.css')->send();
		}catch(\Exception $e){
		}
		return view('facture',['facture' => $facture]);
		//return redirect()->back();
	}





	
}