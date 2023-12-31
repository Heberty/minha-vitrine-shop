<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogTypeRequest extends FormRequest
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
            'title' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Por favor digite um título para à categoria'
        ];
    }
}
