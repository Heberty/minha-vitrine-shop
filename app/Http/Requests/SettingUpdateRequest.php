<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
            'title_site'        => 'required|string',
            'description_site'  => 'required|string',
            'keywords_site'     => 'required|string',
            'image'             => 'nullable|mimes:png,jpg,jpeg',
            'favicon'           => 'nullable|mimes:png,ico',
            'email'             => 'required|string|email',
            'whatsapp'          => 'required|string',
            'title_whatsapp'    => 'required|string',
            'whatsapp_message'  => 'required|string',
            'predominant_color' => 'required|string',
            'secondary_color'   => 'required|string',
            'button_color'      => 'required|string',
            'active_trial'     => 'boolean',
            'active_linkme'     => 'boolean',
            'active_vitrine'    => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'active.boolean'             => 'Active inválido',
            'title_site.required'        => 'Informe o título do site',
            'description_site.required'  => 'Informe a descrição do site',
            'keywords_site.required'     => 'Informe as keywords do site',
            'image.required'              => 'Esolha a imagem da logo',
            'email.required'             => 'Defina o email para o site',
            'email.email'                => 'Insira um email válido',
            'whatsapp.required'          => 'Defina o whatsapp para o site',
            'whatsapp_message.required'  => 'Defina a mensagem do whatsapp para o site',
            'predominant_color.required' => 'Defina a cor predominante do site',
        ];
    }
}
