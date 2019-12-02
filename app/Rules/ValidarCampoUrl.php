<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Admin\Menu;

class ValidarCampoUrl implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        if($value != '#'){
            $menu = Menu::where($attribute, $value)->where('id', '!=', request()->route('id'))->get();
            return $menu->isEmpty();
        }
        return true;
    }

    public function message()
    {
        return 'Esta url ya esta asignada';
    }
}
