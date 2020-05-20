<?php

namespace App\Transformers;

use App\Models\League;
use League\Fractal\TransformerAbstract;

class LeaguesTreeTransformer extends TransformerAbstract
{
    public function transform(League $item)
    {
        return [
            'id'          => $item->id,
            'name'        => $item->name,
            'slug'        => $item->slug,
            'url'         => $item->url,
            'image_url'   => $item->image_url,
            'modified_at' => $item->modified_at,
            'series'      => $item->series->map(function ($serie) {
                return (new SeriesTransformer())->transform($serie);
            }),
        ];
    }
}
