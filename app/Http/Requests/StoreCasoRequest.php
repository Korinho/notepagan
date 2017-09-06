<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class StoreCasoRequest extends FormRequest
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
            'titulo'        =>  'required',
            'adeudo'        =>  'required|numeric',
            'descripcion'   =>  'required',
            'terminos'      =>  'required'
            //
        ];
    }
    public function messages()
    {
        return [
            'titulo.required'       =>  'Es necesario que ingreses un nombre de proyecto',
            'adeudo.required'       =>  'Es necesario que ingreses la cantidad que no se pago',
            'adeudo.numeric'        =>  'El campo no pago tiene que contener una cantidad numérica',
            'descripcion.required'  =>  'Es necesario que ingreses la descripción del caso',
            'terminos'              =>  'Debes aceptar las políticas de privacidad y los términos y condiciones de la empresa'
        ];
    }

}
