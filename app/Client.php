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

    public function langues()
    {
        return $this->belongsToMany('App\Langue');
    }

    public function __construct($client){
        parent::__construct();
        $this->nom = $client->nom;
        $this->prenom = $client->prenom;
        $this->email = $client->email;
        $this->tel_portable = $client->tel_portable;
        $this->commentaire = $client->commentaire;
        $this->tel_fixe = $client->tel_fixe;
    }
}
