<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
	protected $fillable = [
        'titre', 'content', 'client_id' , 'tel_portable', 'commentaire' , 'tel_fixe' , 'dateEvent' , 'langue_dest', 'langue_ini', 'adresse_id'
    ];

    public function client(){
    	return $this->belongsTo(Client::class);
    }

    public function adresse(){
    	return $this->belongsTo(adresse::class);
    }
}
