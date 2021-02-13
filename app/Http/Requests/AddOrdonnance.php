<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOrdonnance extends FormRequest
{
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
            'dose'               => ['required'],
            'médicament'         => ['required'],
            'duree_traitement'   => ['required'],
            'moment_prises'      => ['required'],
        ];
    }
}
