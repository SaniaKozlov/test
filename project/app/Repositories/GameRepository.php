<?php

namespace App\Repositories;

use App\Models\Game;
use App\Repositories\Interfaces\IGameRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class GameRepository extends BaseRepository implements IGameRepository
{
    public function __construct(Game $model)
    {
        parent::__construct($model);
    }
}
