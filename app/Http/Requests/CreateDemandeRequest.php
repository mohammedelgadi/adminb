<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

class CreateDemandeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'titre' => 'required',
        'content' => 'required',
        'client_id' => 'required',
        'dateEvent' => 'required',
        'dateEndEvent' => 'required',
        'langue_ini' => 'required',
        'langue_dest' => 'required',
        'code_postal' => 'required',
        'ville' => 'required',
        'pays'=> 'required',
        'adresse'=> 'required'
        ];
    }
}
