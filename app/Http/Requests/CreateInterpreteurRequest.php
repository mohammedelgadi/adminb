<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Auth;

class CreateInterpreteurRequest extends Request
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
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:interpreteurs,email',
            'langue_ini' => 'required',
            'langue_dest' => 'required',
            'code_postal' => 'required',
            'ville' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'pays'=> 'required'
        ];
    }
}
