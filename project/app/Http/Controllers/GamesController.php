<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateGameRequest;
use App\Repositories\Interfaces\IGameRepository;
use App\Transformers\GamesTransformer;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    private $_gameRepository;

    public function __construct(IGameRepository $gameRepository)
    {
        $this->_gameRepository = $gameRepository;
    }

    public function create(CreateGameRequest $request)
    {
        $game = $this->_gameRepository->create($request->all());

        return $this->response($game, new GamesTransformer());
    }

    public function details($id)
    {
        $game = $this->_gameRepository->find($id);

        return $this->response($game, new GamesTransformer());
    }

    public function list(Request $request)
    {
        return $this->withPaginator(
            $this->_gameRepository->list($request->input('page', 1)),
            new GamesTransformer()
        );
    }
}
