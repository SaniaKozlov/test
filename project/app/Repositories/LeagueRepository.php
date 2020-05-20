<?php


namespace App\Repositories;


use App\Models\League;
use App\Repositories\Interfaces\ILeagueRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class LeagueRepository extends BaseRepository implements ILeagueRepository
{
    public function __construct(League $model)
    {
        parent::__construct($model);
    }

    /**
     * @param int $id
     * @return League|null
     */
    public function getTree(int $id): ?League
    {
        return $this->model->with(['series', 'series.tournaments', 'series.tournaments.matches', 'series.tournaments.matches.games', 'series.tournaments.matches.opponents'])->find($id);
    }
}
