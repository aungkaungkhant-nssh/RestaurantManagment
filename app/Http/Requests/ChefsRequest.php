<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChefsRequest extends FormRequest
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
            "name"=>"required|max:255",
            "speciality"=>"required|max:255",
            "image"=>"required"
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Name is required',
            'speciality.required' => 'Speciality is required',
            'image.required'=>"Please Choose Image"
        ];
    }
}
