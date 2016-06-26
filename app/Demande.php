<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
	protected $fillable = [
    'titre', 'content', 'client_id' , 'tel_portable', 'commentaire' , 'tel_fixe' , 'dateEvent' , 'dateEndEvent' , 'langue_dest', 'langue_ini', 'adresse_id'
    ];

    public function client(){
    	return $this->belongsTo(Client::class,'client_id');
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

    public function etat(){
    	return $this->belongsTo(Etat::class);
    }

    public function devies(){
        return $this->hasMany(Devie::class)->where('activation', 1);
    }

    public function factures(){
        return $this->hasMany(Facture::class)->where('activation', 1);
    }


}
