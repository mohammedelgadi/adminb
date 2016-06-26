<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Facture;


class FactureController extends Controller
{
	public function show($id){
		$facture =Facture::find($id);
		return view('facture',['facture' => $facture]);
	}

	public function factures($id){
		$facture =Facture::find($id);
		return view('facture',['facture' => $facture]);
	}
}
