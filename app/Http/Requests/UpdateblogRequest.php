<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateblogRequest extends FormRequest
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
          if($this->description !="" && $this->avatar !="" && $this->title !=""){
            return [
          'description' => ['required', 'string','max:1000', 'min:3'],
          'avatar' => ['required','image'],
          'title' => ['required', 'string', 'max:100', 'min:3'],
        ];
      }
      if($this->description !="" && $this->avatar !="" ){
        return [
          'description' => ['required', 'string','max:1000', 'min:3'],
          'avatar' => ['required','image'],
        ];
      }
      if($this->description !="" && $this->title !=""){
        return [
          'description' => ['required', 'string','max:1000', 'min:3'],
          'title' => ['required', 'string', 'max:100', 'min:3'],
        ];
      }
      if($this->avatar !="" && $this->title !=""){
        return [
          'avatar' => ['required','image'],
          'title' => ['required', 'string', 'max:100', 'min:3'],
        ];
      }
  }
}
