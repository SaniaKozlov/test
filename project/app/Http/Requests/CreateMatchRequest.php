<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMatchRequest extends FormRequest
{
    public function rules()
    {
        return [
            'slug'                  => 'required|string|max:255|unique:matches,slug',
            'match_type'            => 'required|string|max:255',
            'status'                => 'required|string|max:255',
            'official_stream_url'   => 'nullable|string|max:2048',
            'name'                  => 'required|string|max:255',
            'live_url'              => 'nullable|string|max:2048',
            'live_embed_url'        => 'nullable|string|max:2048',
            'videogame_version'     => 'nullable|string|max:255',
            'number_of_games'       => 'required|integer',
            'rescheduled'           => 'required|integer|in:0,1',
            'detailed_status'       => 'required|integer|in:0,1',
            'forfeit'               => 'required|integer|in:0,1',
            'draw'                  => 'required|integer|in:0,1',
            'tournament_id'         => 'required|integer|exists:tournaments,id',
            'game_advantage'        => 'nullable|integer|exists:commands,id',
            'winner_id'             => 'nullable|integer|exists:commands,id',
            'original_scheduled_at' => 'nullable|date|date_format:Y-m-d H:i:s',
            'begin_at'              => 'nullable|date|date_format:Y-m-d H:i:s',
            'scheduled_at'          => 'nullable|date|date_format:Y-m-d H:i:s',
            'end_at'                => 'nullable|date|date_format:Y-m-d H:i:s',
            'opponents' => 'required|array|min:1',
            'opponents.*' => 'required|integer|exists:commands,id',
        ];
    }
}
