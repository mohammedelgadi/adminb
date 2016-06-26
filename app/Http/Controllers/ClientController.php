<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Client;

use Input;

use Mailman;

class ClientController extends Controller
{
	public function store(Request $request){

		//var_dump($request->file('image'));
		
		$this->validate($request, [
			'nom' => 'required',
			'prenom' => 'required',
			'email' => 'required|email|unique:clients,email'
			]);

		$client = new Client($request->all());
		//$langues = preg_split("/\s+/", $request->langues);

		if(!empty($request->file('image'))){
			$imageName = $request->nom . '.' . 
			$request->file('image')->getClientOriginalExtension();
			$request->file('image')->move(
				base_path() . '/public/images/clients/', $imageName
			);
			$client->image =  $imageName;
		}
		$client->save();

		Mailman::make('emailNotification')->from('mohelgadi@gmail.com')->to('mohelgadi@gmail.com')->subject('New Account has been added')->setCss('public/css/notification.css')->send();

		return view('clientform')->with(
			[	
				'nom' => $request->nom,
				'prenom' => $request->prenom
			]
		);
	}

	public function add(){
		return view('clientform');
	}
}
