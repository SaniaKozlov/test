<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class BaseRepository implements IRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function firstOrCreate(array $data, array $attrs = []): Model
    {
        return $this->model->firstOrCreate($data, $attrs);
    }

    public function update(Model $model, array $data)
    {
        $model->update($data);
    }

    public function delete($id)
    {
        $model = $this->find($id);
        if ($model) {
            $model->delete();
        }
    }

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function createMany(array $data): Collection
    {
        foreach ($data as $item) {
            $collected[] = $this->firstOrCreate(Arr::only($item, ['id']), Arr::only($item, $this->model->getFillable()));
        }

        return collect($collected??[]);
    }

    public function list($page): LengthAwarePaginator
    {
        return $this->model->query()->paginate(config('pagination.per_page'), ['*'], 'page', $page);
    }
}
