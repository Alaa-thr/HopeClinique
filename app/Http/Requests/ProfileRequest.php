<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:30', 'min:3','regex:/^[\pL\s\-]+$/u'],
            'last_name' => ['required', 'string','regex:/^[\pL\s\-]+$/u'],//'/^[\pL\s\-]+$/u' : accept only caractrs & spaces
            'avatar' =>['image'],
            'email' =>['required', 'string', 'email'],
            'phone_number' =>['required', 'string','regex:/0[5-7][0-9]+/','min:10','max:10'],
        ];
    }
}
