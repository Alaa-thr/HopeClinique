<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
          'description' => ['required', 'string','max:1000', 'min:3'],
          'avatar' => ['required','image'],
          'title' => ['required', 'string', 'max:100', 'min:3'],
        ];

  }
}
