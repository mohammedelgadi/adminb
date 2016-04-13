<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Lang;

class InterpreteurController extends Controller
{
    public function show(){

    	$langues = Lang::all();

    	return view('interpreteur', ['langues' => $langues]);

    }

    public function store(Request $request){
    	return $request->all();
    }
}
