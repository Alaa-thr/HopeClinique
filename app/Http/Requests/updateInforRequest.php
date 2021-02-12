<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateInforRequest extends FormRequest
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
      if($this->roleU == 'adminM' || $this->roleU == 'doctor'){
        return [
          'first_name' => ['required', 'string', 'max:30', 'min:3'],
          'last_name' => ['required', 'string', 'max:30', 'min:3'],
          'gender' => ['required', 'string', 'max:30', 'min:3'],
          'specialite' => ['required', 'string', 'max:30', 'min:3'],
          'email' =>['required', 'string', 'email'],
          'phone' =>['required', 'string','regex:/0[5-7][0-9]+/','min:10','max:10'],
        ];
    }
    elseif($this->roleU == 'secretaire'){
      return [
        'first_name' => ['required', 'string', 'max:30', 'min:3'],
        'last_name' => ['required', 'string', 'max:30', 'min:3'],
        'gender' => ['required', 'string', 'max:30', 'min:3'],
        'email' =>['required', 'string', 'email'],
        'phone' =>['required', 'string','regex:/0[5-7][0-9]+/','min:10','max:10'],
      ];
  }
  elseif($this->roleU == 'patient'){
    return [
      'first_name' => ['required', 'string', 'max:30', 'min:3'],
      'last_name' => ['required', 'string', 'max:30', 'min:3'],
      'gender' => ['required', 'string', 'max:30', 'min:3'],
      'date_of_birth' =>['required'],
      'city' => ['required'],
      'social_security' => ['required','min:12','max:12','alpha_num'],
      //'comment' => ['nullable','string','regex:/^[a-z0-9A-Z]+[a-z0-9A-Z"_-éèàç,.:!?<>%*()&]+'],
      'allergie' => ['nullable','string','regex:/^[\pL\s\-]+$/u'],
      'antecedent' => ['nullable','string'],
      'chronic_diseases' => ['nullable','string','regex:/^[\pL\s\-]+$/u'],
      'email' =>['required', 'string', 'email'],
      'phone' =>['required', 'string','regex:/0[5-7][0-9]+/','min:10','max:10'],
    ];
}
  }
}
