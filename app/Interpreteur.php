<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;

class Interpreteur extends Model
{
	protected $fillable = [
	'nom', 'prenom', 'email' , 'tel_portable', 'commentaire' , 'tel_fixe' , 'image' , 'langue_dest', 'langue_ini'
	];

	
	public static function validate($data){
		$rules = [
		'nom' => 'required',
		'prenom' => 'required',
		'email' => 'required|email|unique:interpreteurs,email',
		'langue_ini' => 'required',
		'langue_dest' => 'required',
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

	public function langueIni(){
		return $this->belongsTo(Lang::class,'langue_ini');
	}

	public function langueDest(){
		return $this->belongsTo(Lang::class,'langue_dest');
	}


}
