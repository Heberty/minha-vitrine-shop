<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class ProductUpdateRequest extends FormRequest
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
            'price' => $this->price ? str_replace(",", ".", str_replace(".", "", $this->price)) : null,
            'promotion' => $this->promotion ? true : false, 
            'super_offer' => $this->super_offer ? true : false, 
            'delivery_free' => $this->delivery_free ? true : false,
            'slug' => Str::slug($this->title . '-' . $this->brand, '-'),
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
            'active'        => 'required|boolean',
            'title'         => 'required|string',
            'brand'         => 'string',
            'price'         => 'required',
            'text_legal'    => 'string',
            'delivery_free' => 'boolean',
            'super_offer'   => 'boolean',
            'promotion'     => 'boolean',
            'amount'        => 'integer',
            'description'   => 'required|string',
            'type_id'       => 'required|exists:types,id',
            'image'         => 'nullable|mimes:png,jpg,jpeg',
            'gallery'       => 'nullable',
            'gallery.*'     => 'image|mimes:jpg,jpeg,png',
            'position'      => 'integer',
            'video'         => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'active.required'        => 'Informe se o slide está ativo',
            'active.boolean'         => 'Active inválido',
            'title.required'         => 'Informe o título',
            'price.required'          => 'Informe o preço do produto',
            'description.required'   => 'Insira uma descrição',
            'gallery.*.image'          => 'O arquivo * não é uma imagem',
            'gallery.*.mimes'          => 'A imagem * não está no formato desejado: As imagens devem ter formato JPG, JPEG ou PNG',
        ];
    }
}
