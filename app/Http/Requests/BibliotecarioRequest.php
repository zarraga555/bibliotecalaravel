<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BibliotecarioRequest extends FormRequest
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
            'turno' => 'required',
            'salario' => 'required',
            'fechaNacimiento' => 'required',
            'paisNacimiento' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ci.required' => 'Necesito el numero de documento',
            'nombre.required' => 'Necesito el nombre del bibliotecario',
            'direccion.required' => 'Necesito el direccion del bibliotecario',
            'telefono.required' => 'Necesito el telefono del bibliotecario',
            'correo.required' => 'Necesito el email del bibliotecario',
            'turno.required' => 'Necesito el turno del bibliotecario',
            'salario.required' => 'Necesito el salario del bibliotecario',
            'fechaNacimiento.required' => 'Necesito la fecha de nacimiento',
            'paisNacimiento.required' => 'Necesito la nacionalidad',
        ];
    }
}
