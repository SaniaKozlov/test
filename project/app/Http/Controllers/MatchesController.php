<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatchRequest;
use App\Repositories\Interfaces\IMatchRepository;
use App\Transformers\MatchTransformer;
use Illuminate\Http\Request;

class MatchesController extends Controller
{
    private $_matchRepository;

    public function __construct(IMatchRepository $matchRepository)
    {
        $this->_matchRepository = $matchRepository;
    }

    public function create(CreateMatchRequest $request)
    {
        $match = $this->_matchRepository->create($request->all());

        return $this->response($match, new MatchTransformer());
    }

    public function details($id)
    {
        $match = $this->_matchRepository->find($id);

        return $this->response($match, new MatchTransformer());
    }

    public function list(Request $request)
    {
        return $this->withPaginator(
            $this->_matchRepository->list($request->input('page', 1)),
            new MatchTransformer()
        );
    }
}
