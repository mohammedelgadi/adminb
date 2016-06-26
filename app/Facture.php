<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    public function devis(){
    	//return Devie::find($this->devie_id);
   		return $this->belongsTo(Devie::class,'devie_id');
    }
}
