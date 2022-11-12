<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'nombre_usuario' => 'required',
            'username' => 'required',
            'password' => 'required',
            'user_rol' => 'required',
            // 'dni' => 'required|digits:8|unique:asesors',
        ];
    }
}
