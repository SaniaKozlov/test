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

    public function getTree(int $id): League
    {
        return $this->model->with(['series', 'series.tournaments', 'series.tournaments.matches', 'series.tournaments.matches.games', 'series.tournaments.matches.opponents'])->find($id);
    }

    public function details(int $id): League
    {
        return $this->model->find($id);
    }
}
