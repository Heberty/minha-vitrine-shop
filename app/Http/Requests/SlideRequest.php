<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'active' => $this->active ? true : false,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'active' => 'required|boolean',
            'title'  => 'required|string',
            'link'  => 'string',
            'image'  => 'nullable|mimes:png,jpg,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'active.required' => 'Inform se o slide está ativo',
            'active.boolean'  => 'Active inválido',
            'title.required'  => 'Informe o título'
        ];
    }
}
