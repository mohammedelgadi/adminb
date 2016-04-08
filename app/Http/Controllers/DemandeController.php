<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Demande;

class DemandeController extends Controller
{
    public function store(Request $request){

        return $request; 

    	$this->validate($request, [
			'titre' => 'required',
			'content' => 'required',
			'client_id' => 'required',
			'dateEvent' => 'required'
		]);

		Demande::create($request->all());

    	return $request->all();
    }

    public function edit($id){
    	$demande = Demande::find($id);
    	return view('demandeEdit');
    }
}
