<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTournamentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required|string|max:255|unique:tournaments,name',
            'slug'      => 'required|string|max:255|unique:tournaments,slug',
            'prizepool'   => 'nullable|string|max:255',
            'winner_type' => 'nullable|string|max:2048',
            'serie_id'  => 'required|integer|exists:series,id',
            'winner_id'  => 'nullable|integer|exists:commands,id',
            'live_supported'  => 'required|integer|in:0,1',
            'begin_at'  => 'required|date|date_format:Y-m-d H:i:s',
            'end_at'  => 'required|date|date_format:Y-m-d H:i:s',
        ];
    }
}
