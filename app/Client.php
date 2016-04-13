<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $fillable = [
        'nom', 'prenom', 'email' , 'tel_portable', 'commentaire' , 'tel_fixe'
    ];

    public function demandes(){
    	return $this->hasMany(Demande::class);
    }

    public function langs()
    {
        return $this->belongsToMany(Lang::class);
    }

    public function adresse(){
        return $this->belongsTo(Adresse::class);
    }
}
