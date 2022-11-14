<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculaStoreRequest extends FormRequest
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
            'nivel' => 'required|string',
            'grado' => 'required|string',
            'seccion' => 'required|string',
            'monto' => 'required',
            'banco' => 'required|string',
            'dni_apoderado' => 'required|digits:8',
            'nombres_apoderado' => 'required|string',
            'apellidos_apoderado' => 'required|string',
        ];
    }
}
