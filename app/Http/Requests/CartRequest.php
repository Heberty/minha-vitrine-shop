<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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

    /* protected function prepareForValidation()
    {
        $this->merge([
            'entrega' => $this->entrega ? true : false,
        ]);
    } */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|min:10',
            'address'      => 'required|min:10',
            'instagram'   => 'required',
            'entrega'     => 'required'
        ];
    }

    public function message()
    {
        return [
            'name.required'      => 'Por favor, preencha seu nome',
            'name.min'           => 'Por favor, preencha seu nome completo',
            'address.required'    => 'Por favor, preencha o seu endereço',
            'address.min'         => 'Por favor, preencha o seu endereço completo',
            'entrega.required'   => 'Selecione como será a entrega',
            'instagram.required' => 'Por favor, preencha o seu instagram'
        ];
    }
}
