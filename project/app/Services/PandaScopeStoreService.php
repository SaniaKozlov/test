<?php


namespace App\Services;


use App\Models\League;
use App\Models\Match;
use App\Models\Serie;
use App\Models\Tournament;
use App\Repositories\Interfaces\ICommandRepository;
use App\Repositories\Interfaces\IGameRepository;
use App\Repositories\Interfaces\ILeagueRepository;
use App\Repositories\Interfaces\IMatchRepository;
use App\Repositories\Interfaces\ISerieRepository;
use App\Repositories\Interfaces\ITournamentRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class PandaScopeStoreService
{
    /**
     * @var ILeagueRepository
     */
    private $_leagueRepository;
    /**
     * @var ISerieRepository
     */
    private $_serieRepository;
    /**
     * @var ITournamentRepository
     */
    private $_tournamentRepository;
    /**
     * @var IMatchRepository
     */
    private $_machRepository;
    /**
     * @var IGameRepository
     */
    private $_gameRepository;
    /**
     * @var ICommandRepository
     */
    private $_commandRepository;

    public function __construct(
        ILeagueRepository $leagueRepository,
        ISerieRepository $serieRepository,
        ITournamentRepository $tournamentRepository,
        IMatchRepository $machRepository,
        IGameRepository $gameRepository,
        ICommandRepository $commandRepository
    )
    {
        $this->_leagueRepository     = $leagueRepository;
        $this->_serieRepository      = $serieRepository;
        $this->_tournamentRepository = $tournamentRepository;
        $this->_machRepository       = $machRepository;
        $this->_gameRepository       = $gameRepository;
        $this->_commandRepository    = $commandRepository;
    }

    public function parseData($data)
    {
        foreach ($data as $item) {
            $league = $this->storeLeague($item['league']);
            $serie = $this->storeSeries($item['serie']);
            $tournament = $this->storeTournament($item['tournament']);
            $match = $this->storeMatch($item);
            $games = $this->storeGames($item['games']);
            $commands = $this->storeCommand($item['opponents']);
            $match->opponents()->saveMany($commands);
        }
    }

    private function storeLeague($leagueData): League
    {
        return $this->_leagueRepository->firstOrCreate(Arr::only($leagueData, ['id']), $leagueData);
    }

    private function storeSeries($seriesData): Serie
    {
        return $this->_serieRepository->firstOrCreate(Arr::only($seriesData, ['id']), $seriesData);
    }

    private function storeTournament($tournamentData): Tournament
    {
        return $this->_tournamentRepository->firstOrCreate(Arr::only($tournamentData, ['id']), $tournamentData);
    }

    private function storeMatch($matchData): Match
    {
        return $this->_machRepository->firstOrCreate(Arr::only($matchData, ['id']), $matchData);
    }

    private function storeGames($gameData): Collection
    {
        return $this->_gameRepository->createMany($gameData);
    }

    private function storeCommand($commandData): Collection
    {
        return $this->_commandRepository->createMany(array_map(function ($item) {
            return $item['opponent'];
        }, $commandData));
    }
}
