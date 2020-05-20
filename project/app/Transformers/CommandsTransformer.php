<?php


namespace App\Transformers;


use App\Models\Command;
use League\Fractal\TransformerAbstract;

class CommandsTransformer extends TransformerAbstract
{
    public function transform(Command $item)
    {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'acronym' => $item->acronym,
            'slug' => $item->slug,
            'image_url' => $item->image_url,
            'location' => $item->location,
            'modified_at' => $item->modified_at,
        ];
    }
}
