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
        $list = $this->_leagueRepository->list($request->input('page', 1));

        return $this->withPaginator(
            $list,
            new LeaguesListTransformer()
        );
    }

    public function weblist(Request $request)
    {
        $list = $this->_leagueRepository->list($request->input('page', 1));

        return view('leagues.list', ['list' => $list]);
    }

    public function details($id)
    {
        $item = $this->_leagueRepository->getTree($id);

        return $this->response($item, new LeaguesTreeTransformer());
    }

    public function webdetails($id)
    {
        $item = $this->_leagueRepository->getTree($id);
        if (!$item) {
            abort(404);
        }

        return view('leagues.details', ['item' => $item]);
    }

    public function create(CreateLeagueRequest $request)
    {
        $league = $this->_leagueRepository->create($request->all());

        return $this->response($league, new LeaguesListTransformer());
    }
}
