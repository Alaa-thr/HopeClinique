<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\uniqueService;

class ServiceUpdateRequest extends FormRequest
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
          'avatar' => ['nullable','image'],
          'name_specialty' => ['required', 'string', 'max:100', 'min:3','regex:/^[A-Za-z0-9][A-Za-z0-9\sçàéè]+$/',new uniqueService($this->idService)],
          'description' => ['required', 'string', 'min:3','regex:/^[A-Za-z0-9][A-Za-z0-9\s.(,)çàéè]+$/'],
        ];
    }
}
