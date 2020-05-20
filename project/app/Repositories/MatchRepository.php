<?php

namespace App\Repositories;

use App\Models\Command;
use App\Models\Match;
use App\Repositories\Interfaces\IMatchRepository;
use Illuminate\Database\Eloquent\Model;

class MatchRepository extends BaseRepository implements IMatchRepository
{
    public function __construct(Match $model)
    {
        parent::__construct($model);
    }

    public function create(array $attributes): Model
    {
        $attributes['results'] = [];
        $opponents = Command::query()->whereIn('id', $attributes['opponents'])->get();
        $match = $this->model->create($attributes);
        $match->opponents()->saveMany($opponents);

        return $match;
    }
}
