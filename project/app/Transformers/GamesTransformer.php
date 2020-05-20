<?php


namespace App\Transformers;


use App\Models\Game;
use League\Fractal\TransformerAbstract;

class GamesTransformer extends TransformerAbstract
{
    public function transform(Game $item)
    {
        return [
            'id'              => $item->id,
            'begin_at'        => $item->begin_at,
            'end_at'          => $item->end_at,
            'detailed_stats' => $item->detailed_stats,
            'finished'        => $item->finished,
            'forfeit'         => $item->forfeit,
            'length'          => $item->length,
            'position'        => $item->position,
            'video_url'       => $item->video_url,
            'winner'          => $item->winner ?? null,
            'winner_type'     => $item->winner_type,
        ];
    }
}
