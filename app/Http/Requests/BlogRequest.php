<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class BlogRequest extends FormRequest
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
            'slug'   => Str::slug($this->title, '-') . '-' . $this->subtitle ? Str::slug($this->subtitle, '-') : '',
            'active' => $this->active ? true : false
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
            'title'        => 'required|string',
            'image_full'   => 'required|mimes:png,jpg,jpeg',
            'text'         => 'required|string',
            'author'       => 'required|string',
            'fonte'        => 'required|string',
            'fonte_link'   => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required'       => 'Por favor, digite um título para a postagem',
            'image_full.required'  => 'Por favor, insira uma imagem para a postagem',
            'image_full.mimes'     => 'Só serão permitidos imagens em jpg ou png',
            'text.required'        => 'Por favor, digite um texto para a postagem',
            'author.required'      => 'Por favor, digite um autor para a postagem',
            'fonte.required'       => 'Por favor, digite a fonte para a postagem',
            'link.required'        => 'Por favor, digite o link da fonte para a postagem'
            
        ];
    }
}
