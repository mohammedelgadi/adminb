<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devie extends Model
{
    public function services(){
        return $this->hasMany(Service::class);
    }

    public function demande(){
    	return $this->belongsTo(Demande::class);
    }

    public function interpreteur(){
    	return $this->belongsTo(Interpreteur::class);
    }

    

    public function facturer(){
    	$facture = new Facture();
		$facture->demande_id = $this->demande_id;
		$facture->devie_id = $this->id;
		$facture->save();
		$this->demande->etat()->associate(Etat::find(3));
		$this->demande->save();
		return $facture;
    }
}
