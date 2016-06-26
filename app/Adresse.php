<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
	protected $fillable = [
		'adresse', 'numero', 'route' , 'code_postal', 'ville' , 'pays' , 'departement', 'long' , 'lat'
	];

}
