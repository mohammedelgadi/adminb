<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devie extends Model
{
    public function services(){
        return $this->hasMany(Service::class);
    }
}