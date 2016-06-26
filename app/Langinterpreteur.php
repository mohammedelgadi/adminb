<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Langinterpreteur extends Model
{
    public function langInit(){
    	return $this->belongsTo(Lang::class,'langs_init_id');
    }

    public function langDest(){
    	return $this->belongsTo(Lang::class,'langs_dest_id');
    }
}
