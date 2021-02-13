<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TimeBegingLessTimeEnd;

class AddAppointment extends FormRequest
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
            'patient' =>['required'],
            'doctor' =>['required'],
            'date' =>  ['required'],
            'time_end' =>['required',],
            'time_beging' =>['required'],
            'email' =>['required', 'string','email'],
            'phone_number' =>['required','string','regex:/^0[5-7][0-9]+/',"min:10","max:10"],
            'reason' =>['required','string',"regex:/^[A-Za-z0-9\s.,çàéè()_+*%:!]+$/"],
            
        ];
    }
}
