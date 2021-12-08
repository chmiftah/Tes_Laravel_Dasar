<?php

namespace App\Http\Requests;

use App\Companie;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanieRequest extends FormRequest
{
   
    public function rules()
    {
     
        return [
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
            'logo' => [
                'image',
                'max:2048',
                'mimes:png',
                'dimensions:min_width=100,min_height=100',
                 Rule::requiredIf(request()->routeIs('companie.store')),            ]
        ];
    }
}
