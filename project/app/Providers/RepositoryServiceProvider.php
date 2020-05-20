<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\CommandRepository;
use App\Repositories\GameRepository;
use App\Repositories\Interfaces\ICommandRepository;
use App\Repositories\Interfaces\IGameRepository;
use App\Repositories\Interfaces\ILeagueRepository;
use App\Repositories\Interfaces\IMatchRepository;
use App\Repositories\Interfaces\IRepository;
use App\Repositories\Interfaces\ISerieRepository;
use App\Repositories\Interfaces\ITournamentRepository;
use App\Repositories\LeagueRepository;
use App\Repositories\MatchRepository;
use App\Repositories\SerieRepository;
use App\Repositories\TournamentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IRepository::class, BaseRepository::class);
        $this->app->bind(ILeagueRepository::class, LeagueRepository::class);
        $this->app->bind(ISerieRepository::class, SerieRepository::class);
        $this->app->bind(ITournamentRepository::class, TournamentRepository::class);
        $this->app->bind(ICommandRepository::class, CommandRepository::class);
        $this->app->bind(IMatchRepository::class, MatchRepository::class);
        $this->app->bind(IGameRepository::class, GameRepository::class);
    }
}
