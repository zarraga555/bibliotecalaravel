<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
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
            'nombre' => 'required',
            'nacionalidad' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Necesito el nombre del autor',
            'nacionalidad.required' => 'Necesito la nacionalidad del autor',
        ];
    }
}
