<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonaRequest extends FormRequest
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
            'ci' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'fechaNacimiento' => 'required',
            'paisNacimiento' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'ci.required' => 'Necesito el numero de documento',
            'nombre.required' => 'Necesito el nombre de la persona',
            'direccion.required' => 'Necesito el direccion de la persona',
            'telefono.required' => 'Necesito el telefono de la persona',
            'correo.required' => 'Necesito el email de la persona',
            'fechaNacimiento.required' => 'Necesito la fecha de nacimiento',
            'paisNacimiento.required' => 'Necesito la nacionalidad',
        ];
    }
}
