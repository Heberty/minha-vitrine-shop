<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class TypeRequest extends FormRequest
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
            'slug' => Str::slug($this->title, '-'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'PATCH') {
            return [
                'active'   => 'required|boolean',
                'title'    => 'required|string|unique:types,title,'.$this->type->id,
            ];
        } else {
            return [
                'active'   => 'required|boolean',
                'title'    => 'required|string|unique:types',
            ];
        }
    }

    public function messages()
    {
        return [
            'active.required' => 'Informe se a categoria está ativa',
            'active.boolean'  => 'Active inválido',
            'title.required'  => 'Informe o título',
            'title.unique'    => 'Já existe uma categoria com o mesmo nome.'
        ];
    }
}
