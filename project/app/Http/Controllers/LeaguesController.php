<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeagueRequest;
use App\Http\Requests\UpdateLeagueRequest;
use App\Repositories\Interfaces\ILeagueRepository;
use App\Transformers\LeaguesListTransformer;
use App\Transformers\LeaguesTreeTransformer;
use Illuminate\Http\Request;

class LeaguesController extends Controller
{
    private $_leagueRepository;

    public function __construct(ILeagueRepository $leagueRepository)
    {
        $this->_leagueRepository = $leagueRepository;
    }

    public function list(Request $request)
    {
        return $this->withPaginator(
            $this->_leagueRepository->list($request->input('page', 1)),
            new LeaguesListTransformer()
        );
    }

    public function weblist(Request $request)
    {
        return view('leagues.list', ['list' => $this->_leagueRepository->list($request->input('page', 1))]);
    }

    public function details($id)
    {
        return $this->response($this->_leagueRepository->getTree($id), new LeaguesTreeTransformer());
    }

    public function webdetails($id)
    {
        return view('leagues.details', ['item' => $this->_leagueRepository->getTree($id)]);
    }

    public function create(CreateLeagueRequest $request)
    {
        $league = $this->_leagueRepository->create($request->all());

        return $this->response($league, new LeaguesListTransformer());
    }
}
