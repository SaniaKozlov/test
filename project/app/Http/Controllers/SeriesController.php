<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreateSeriesRequest;
use App\Repositories\Interfaces\ISerieRepository;
use App\Transformers\SeriesTransformer;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    private $_seriesRepository;

    public function __construct(ISerieRepository $serieRepository)
    {
        $this->_seriesRepository = $serieRepository;
    }
    public function create(CreateSeriesRequest $request)
    {
        $match = $this->_seriesRepository->create($request->all());

        return $this->response($match, new SeriesTransformer());
    }

    public function details($id)
    {
        $match = $this->_seriesRepository->find($id);

        return $this->response($match, new SeriesTransformer());
    }

    public function list(Request $request)
    {
        return $this->withPaginator(
            $this->_seriesRepository->list($request->input('page', 1)),
            new SeriesTransformer()
        );
    }
}
