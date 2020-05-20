<?php

namespace App\Repositories;

use App\Models\Tournament;
use App\Repositories\Interfaces\ITournamentRepository;

class TournamentRepository extends BaseRepository implements ITournamentRepository
{
    public function __construct(Tournament $model)
    {
        parent::__construct($model);
    }
}
