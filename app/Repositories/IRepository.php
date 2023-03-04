<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repository\Eloquent
 */
interface IRepository
{
    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    public function find($id): ?Model;

    public function all(): Collection;


    public function where($column, $operator = null, $value = null, $boolean = 'and'): Builder;

    public function updateOrCreate($filter, $data = []): Model;

    public function delete(Model $model): ?bool;
}
