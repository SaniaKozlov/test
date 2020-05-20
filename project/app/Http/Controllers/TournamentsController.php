<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateTournamentRequest;
use App\Repositories\Interfaces\ITournamentRepository;
use App\Transformers\TournamentsTransformer;
use Illuminate\Http\Request;

class TournamentsController extends Controller
{
    private $_tournamentRepository;

    public function __construct(ITournamentRepository $tournamentRepository)
    {
        $this->_tournamentRepository = $tournamentRepository;
    }

    public function create(CreateTournamentRequest $request)
    {
        $match = $this->_tournamentRepository->create($request->all());

        return $this->response($match, new TournamentsTransformer());
    }

    public function details($id)
    {
        $match = $this->_tournamentRepository->find($id);

        return $this->response($match, new TournamentsTransformer());
    }

    public function list(Request $request)
    {
        return $this->withPaginator(
            $this->_tournamentRepository->list($request->input('page', 1)),
            new TournamentsTransformer()
        );
    }
}
