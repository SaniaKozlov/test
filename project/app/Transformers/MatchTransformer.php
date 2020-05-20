<?php


namespace App\Transformers;


use App\Models\Match;
use League\Fractal\TransformerAbstract;

class MatchTransformer extends TransformerAbstract
{
    public function transform(Match $item)
    {
        return [
            'id'                    => $item->id,
            'name'                  => $item->name,
            'slug'                  => $item->slug,
            'match_type'            => $item->match_type,
            'status'                => $item->status,
            'official_stream_url'   => $item->official_stream_url,
            'live_url'              => $item->live_url,
            'live_embed_url'        => $item->live_embed_url,
            'videogame_version'     => $item->videogame_version,
            'results'               => $item->results,
            'number_of_games'       => $item->number_of_games,
            'rescheduled'           => $item->rescheduled,
            'detailed_status'       => $item->detailed_status,
            'forfeit'               => $item->forfeit,
            'draw'                  => $item->draw,
            'game_advantage'        => $item->game_advantage,
            'winner_id'             => $item->winner??null,
            'original_scheduled_at' => $item->original_scheduled_at,
            'begin_at'              => $item->begin_at,
            'scheduled_at'          => $item->scheduled_at,
            'end_at'                => $item->end_at,
            'modified_at'           => $item->modified_at,
            'opponents'             => '',
            'games'                 => $item->games->map(function ($game) {
                return (new GamesTransformer())->transform($game);
            }),
        ];
    }
}
