<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Repository implements IRepository
{
    protected $model;

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

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param $column
     * @param null $operator
     * @param null $value
     * @param string $boolean
     * @return Builder
     */
    public function where($column, $operator = null, $value = null, $boolean = 'and'): Builder
    {
        return $this->model->where(...func_get_args());
    }

    /**
     * @param $filter
     * @param array $data
     * @return mixed
     */
    public function updateOrCreate($filter, $data = []): Model
    {
        return $this->model->updateOrCreate($filter, $data);
    }

    public function delete(Model $model): ?bool
    {
        $model->enabled = 0;
        return $model->save();
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
