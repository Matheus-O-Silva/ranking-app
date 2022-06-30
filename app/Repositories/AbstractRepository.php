<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository {

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function selectRelationAtribbutes($attributes)
    {
        $this->model = $this->model->with($atributos);
    }

    public function selectAll($attributes)
    {
        $this->model = $this->model->selectRaw($attributes);
    }

    public function getResultado()
    {
        return $this->model->get();
    }

    public function getResultPaginated($registerNumberPerPage) {
        return $this->model->paginate($registerNumberPerPage);
    }
}