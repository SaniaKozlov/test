<?php


namespace App\Transformers;


use App\Models\Serie;
use League\Fractal\TransformerAbstract;

class SeriesTransformer extends TransformerAbstract
{
    public function transform(Serie $item)
    {
        return [
            'id'          => $item->id,
            'name'        => $item->name,
            'full_name'   => $item->full_name,
            'season'      => $item->season,
            'slug'        => $item->slug,
            'description' => $item->description,
            'tier'        => $item->tier,
            'winner_type' => $item->winner_type,
            'winner'      => $item->winner ?? null,
            'year'        => $item->year,
            'begin_at'    => $item->begin_at,
            'modified_at' => $item->modified_at,
            'tournaments' => $item->tournaments->map(function ($tournament) {
                return (new TournamentsTransformer())->transform($tournament);
            }),
        ];
    }
}
