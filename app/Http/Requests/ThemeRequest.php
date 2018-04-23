<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'theme_titre' => 'required',
            'theme_date'=>'required',
            'resume' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'theme_titre.required'    => 'le titre est obligatoire',
            'resume.required'    => 'La date est aussi obligatoire'
        ];
    }
}
