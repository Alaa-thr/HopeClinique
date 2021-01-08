<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AddUsersRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'nom' =>['required','regex:/[a-zA-Z-0-9][a-z0-9A-Zéçèàâ]+/'],
          'prenom' =>['required','regex:/[A-Z-0-9][a-z0-9A-Zéçèàâ]+/'],
          'Num_Secrurite_Social' =>['required','string','regex:/[0-9]+/',"min:12","max:12"],
          'ville' =>['required', 'string'],
          'date_naiss' =>['required'],
          'maladie_chronique' =>['nullable', 'string'],
          'allergie' =>['nullable', 'string'],
          'antecedent' =>['nullable', 'string'],
          'specialite' =>['required', 'string'],
          'commentaire' =>['nullable', 'string'],
          'phone' =>  ['required', 'string','regex:/^0[5-7][0-9]+/',"min:10","max:10"],
          'email' =>['required', 'string'],
          'password' =>['required', 'string', 'min:8','regex:/^[a-zA-Z][0-9]+[&é-è_çà$*@^\]+[&é-è_çà$*a-z0-9A-Z]+/'],
        ];
    }
}
