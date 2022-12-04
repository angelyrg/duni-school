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
            'estudiante_id' => 'required',
            'apoderado_id' => 'required',
            'parentesco' => 'required|string',
            'nivel' => 'required|string',
            'grado' => 'required',
            'seccion' => 'required|string',
            'situacion' => 'required|string',
            'procedencia' => 'required|string',
            'matricula_costo' => 'required',
            'mensualidad_final' => 'required',
            'descuento' => 'required',
            'dia_pago' => 'required|integer'
        ];
    }
}
