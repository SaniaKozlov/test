<?php


namespace App\Transformers;


use App\Models\Tournament;
use League\Fractal\TransformerAbstract;

class TournamentsTransformer extends TransformerAbstract
{
    public function transform(Tournament $item)
    {
        return [
            'id'             => $item->id,
            'name'           => $item->name,
            'slug'           => $item->slug,
            'prizepool'      => $item->prizepool,
            'winner_type'    => $item->winner_type,
            'winner'         => $item->winner ?? null,
            'live_supported' => $item->live_supported,
            'begin_at'       => $item->begin_at,
            'end_at'         => $item->end_at,
            'modified_at'    => $item->modified_at,
            'matches'        => $item->matches->map(function ($match) {
                return (new MatchTransformer())->transform($match);
            }),
        ];
    }
}
