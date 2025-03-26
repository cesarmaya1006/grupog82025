<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|max:50|unique:users,email,' . $this->route('id'),
            'identificacion' => 'required|max:50|unique:users,identificacion,' . $this->route('id'),
        ];
    }
    public function attributes()
    {
        return [
            'email' => 'Correo Electrónico',
            'identificacion' => 'Identificación',

        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El campo correo electrónico es obligatorio',
            'email.unique' => 'El campo correo electrónico ya se encuentra en la base de datos verifique la información e intentelo nuevamente',
            'identificacion.required' => 'El campo identificación es obligatorio',
            'identificacion.unique' => 'El campo identificación ya se encuentra en la base de datos verifique la información e intentelo nuevamente',

        ];
    }
}
