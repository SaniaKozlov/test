<?php


namespace App\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IRepository
{
    public function find($id): ?Model;

    public function firstOrCreate(array $data, array $attrs = []): Model;

    public function create(array $data): Model;

    public function update(Model $model, array $data);

    public function delete($id);

    public function createMany(array $data): Collection;

    public function list(int $page): LengthAwarePaginator;
}
