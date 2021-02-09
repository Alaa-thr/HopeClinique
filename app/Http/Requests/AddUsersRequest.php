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
     * ,'regex:/^[a-zA-Z][0-9]+[&é-è_çà$*@^\]+[&é-è_çà$*a-z0-9A-Z]+/'
     * @return array
     */
    public function rules()
    {
      if($this->typeUser == 'patient'){
        return [
            'first_name' =>['required','regex:/^[\pL\s\-]+$/u'],
            'last_name' =>['required','regex:/^[\pL\s\-]+$/u'],
            'phone_number' =>  ['required', 'string','regex:/^0[5-7][0-9]+/',"min:10","max:10"],
            'email' =>['required', 'string','email'],
            'password' =>['required', 'string', 'min:8'],
            'date_of_birth' =>['required'],
            'city' => ['required'],
            'social_security_number' => ['required','min:12','max:12','alpha_num'],
            /*'commentaire' => ['nullable','string','regex:/^[a-z0-9A-Z]+[a-z0-9A-Z"_-éèàç,.:!?<>%*()&]+'],*/
            'allergie' => ['nullable','string','alpha'],
            'antecedent' => ['nullable','string','alpha'],
            'chronic_diseases' => ['nullable','string','alpha'],
        ];
      }else if($this->typeUser == 'adminM' || $this->typeUser == 'doctor'){
          return [
            'first_name' =>['required','regex:/^[\pL\s\-]+$/u'],
            'last_name' =>['required','regex:/^[\pL\s\-]+$/u'],
            'phone_number' =>  ['required', 'string','regex:/^0[5-7][0-9]+/',"min:10","max:10"],
            'email' =>['required', 'string','email'],
            'password' =>['required', 'string', 'min:8'],
            'Specialty' =>['required', 'string'],
            'avatar' => ['required','image'],
            'role' => ['required'],
          ];
      }else if($this->typeUser == 'secretaire'){
          return [
            'first_name' =>['required','regex:/^[\pL\s\-]+$/u'],
            'last_name' =>['required','regex:/^[\pL\s\-]+$/u'],
            'phone_number' =>  ['required', 'string','regex:/^0[5-7][0-9]+/',"min:10","max:10"],
            'email' =>['required', 'string','email'],
            'password' =>['required', 'string', 'min:8'],
            'avatar' => ['required','image'],
          ];
      }
    }
}
