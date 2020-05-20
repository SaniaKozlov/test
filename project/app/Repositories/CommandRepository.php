<?php


namespace App\Repositories;


use App\Models\Command;
use App\Repositories\Interfaces\ICommandRepository;

class CommandRepository extends BaseRepository implements ICommandRepository
{
    public function __construct(Command $model)
    {
        parent::__construct($model);
    }
}
