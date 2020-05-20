<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommandRequest;
use App\Repositories\Interfaces\ICommandRepository;
use App\Transformers\CommandsTransformer;
use Illuminate\Http\Request;

class CommandsController extends Controller
{
    private $_commandRepository;

    public function __construct(ICommandRepository $commandRepository)
    {
        $this->_commandRepository = $commandRepository;
    }

    public function create(CreateCommandRequest $request)
    {
        $command = $this->_commandRepository->create($request->all());

        return $this->response($command, new CommandsTransformer());
    }

    public function details($id)
    {
        $command = $this->_commandRepository->find($id);

        return $this->response($command, new CommandsTransformer());
    }

    public function list(Request $request)
    {
        return $this->withPaginator(
            $this->_commandRepository->list($request->input('page', 1)),
            new CommandsTransformer()
        );
    }
}
