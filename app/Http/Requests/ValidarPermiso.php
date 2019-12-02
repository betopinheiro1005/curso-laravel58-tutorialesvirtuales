<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarPermiso extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|max:50|unique:permiso,nombre,' . $this->route('id'),
            'slug' => 'required|max:50|unique:permiso,slug,' . $this->route('id'),
        ];
    }
}
