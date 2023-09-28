<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardUpdateRequest extends FormRequest
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
            'active_linkme' => $this->active_linkme ? true : false, 
            'active_vitrine' => $this->active_vitrine ? true : false,
            'active_trial' => $this->active_trial ? true : false,
            'hipercard' => $this->hipercard ? true : false,
            'american' => $this->american ? true : false,
            'aura' => $this->aura ? true : false,
            'hiper' => $this->hiper ? true : false,
            'visa' => $this->visa ? true : false,
            'diners' => $this->diners ? true : false,
            'elo' => $this->elo ? true : false,
            'master' => $this->master ? true : false,
            'boleto' => $this->boleto ? true : false,
            'itau' => $this->itau ? true : false,
            'caixa' => $this->caixa ? true : false,
            'bradesco' => $this->bradesco ? true : false,
            'brasil' => $this->brasil ? true : false,
            'santander' => $this->santander ? true : false,
            'nubank' => $this->nubank ? true : false,
            'inter' => $this->inter ? true : false,
            'next' => $this->next ? true : false,
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
            //
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
