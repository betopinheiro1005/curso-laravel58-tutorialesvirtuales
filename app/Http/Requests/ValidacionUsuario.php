<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUsuario extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->route('id')) {
            return [
                'usuario' => 'required|max:50|unique:usuario,usuario,' . $this->route('id'),
                'nombre' => 'required|max:50',
                'email' => 'required|email|max:100|unique:usuario,email,' . $this->route('id'),
                'password' => 'nullable|min:5',
                're_password' => 'nullable|required_with:password|min:5|same:password',
                'rol_id' => 'required|array'
            ];
        } else {
            return [
                'usuario' => 'required|max:50|unique:usuario,usuario,' . $this->route('id'),
                'nombre' => 'required|max:50',
                'email' => 'required|email|max:100|unique:usuario,email,' . $this->route('id'),
                'password' => 'required|min:5',
                're_password' => 'required|min:5|same:password',
                'rol_id' => 'required|array'
            ];
        }
    }
}
