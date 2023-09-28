<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
            'name'     => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
            'subject'  => 'required',
            'message'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Por favor preencha seu nome',
            'email.required'    => 'Por favor preencha o campo de email',
            'email.email'       => 'Por favor preencha o campo de email corretamente',
            'subject.required'  => 'Por favor preencha o campo de assunto',
            'phone.required'    => 'Por favor preencha o seu Telefone ou Whatsapp',
            'message.required'  => 'Por favor preencha o campo mensagem'
        ];
    }
}
