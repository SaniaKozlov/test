<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommandRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required|string|max:255|unique:commands,name',
            'slug'      => 'required|string|max:255|unique:commands,slug',
            'acronym'   => 'required|string|max:255',
            'image_url' => 'required|string|max:2048',
            'location'  => 'required|string|max:255',
        ];
    }
}
