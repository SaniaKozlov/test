<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSeriesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'full_name'   => 'required|string|max:255',
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:series,slug',
            'season'      => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'tier'        => 'required|string|max:255',
            'winner_type' => 'required|string|max:255',
            'league_id'   => 'required|integer|exists:leagues,id',
            'winner_id'   => 'required|integer|exists:commands,id',
            'year'        => 'required|string|date_format:Y',
            'begin_at'    => 'required|string|date|date_format:Y-m-d H',
            'end_at'      => 'required|string|date|date_format:Y-m-d H',
        ];
    }
}
