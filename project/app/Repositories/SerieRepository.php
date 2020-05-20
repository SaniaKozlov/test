<?php

namespace App\Repositories;

use App\Models\Serie;
use App\Repositories\Interfaces\ISerieRepository;

class SerieRepository extends BaseRepository implements ISerieRepository
{
    public function __construct(Serie $model)
    {
        parent::__construct($model);
    }
}
