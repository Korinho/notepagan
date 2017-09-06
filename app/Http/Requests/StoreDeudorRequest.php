<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeudorRequest extends FormRequest
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
            'nombre'        =>  'required',
            'tipo'        =>  'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'     =>  'Es necesario que ingreses un nombre de la empresa o persona',
            'tipo.required'       =>  'Es necesario que selecciones un tipo'
        ];
    }
}
