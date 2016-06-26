<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;

class Interpreteur extends Model
{
	protected $fillable = [
	'nom', 'prenom', 'email' , 'tel_portable', 'commentaire' , 'tel_fixe' , 'image' , 'prestation' , 'devise'
	];

	
	public static function validate($data){
		$rules = [
		'nom' => 'required',
		'prenom' => 'required',
		'email' => 'required|email|unique:interpreteurs,email',
		'code_postal' => 'required'
		];

		$v = Validator::make($data, $rules);

		return $v;
	}


	public function client(){
		return $this->belongsTo(Client::class);
	}

	public function adresse(){
		return $this->belongsTo(Adresse::class);
	}

	public function langues(){
		return $this->hasMany(Langinterpreteur::class,'interpreteurs_id');
	}


}
