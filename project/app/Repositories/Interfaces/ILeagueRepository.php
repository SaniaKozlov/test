<?php

namespace App\Repositories\Interfaces;

use App\Models\League;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ILeagueRepository extends IRepository
{
    public function getTree(int $id): ?League;
}
