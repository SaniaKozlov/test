<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLeagueRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required|string|max:255|unique:leagues,name',
            'slug'      => 'required||string|max:255|unique:leagues,slug',
            'url'       => 'nullable|string|max:2048',
            'image_url' => 'required||string|max:2048',
        ];
    }
}
