<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGameRequest extends FormRequest
{
    public function rules()
    {
        return [
            'begin_at'       => 'nullable|date|date_format:Y-d-m H:i:s',
            'end_at'         => 'nullable|date|date_format:Y-d-m H:i:s',
            'detailed_stats' => 'required|integer|in:0,1',
            'finished'       => 'required|integer|in:0,1',
            'forfeit'        => 'required|integer|in:0,1',
            'length'         => 'nullable|integer',
            'match_id'       => 'required|integer|exists:matches,id',
            'position'       => 'required|integer|unique:games,id,position',
            'status'         => 'required|string|in:finished,not_played,not_started,running',
            'video_url'      => 'nullable|string|max:2048',
            'winner_id'      => 'nullable|integer|exists:commands,id',
            'winner_type'    => 'required|string|in:Team,Player',
        ];
    }
}
