<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\PersonalController;

class SavePersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
          'Nombre' => 'required',
          'Matricula' => 'required',
          'Nip' => 'required',
          ];

 return[
            'Nombre.required' => 'El registro necesita el nombre',
            'Matricula.required' => 'El registro necesita la Matricula',
            'Nip.required' => 'El registro necesita el nip',

        ];
    }
}

