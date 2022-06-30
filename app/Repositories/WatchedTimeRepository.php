<?php

namespace App\Repositories;
use App\Models\WatchedTime;

class WatchedTimeRepository
{
    protected $model;

    public function __construct(WatchedTime $model)
    {
        return $this->model = $model;
    }

    public function selectRelationWithUsersAndChannels()
    {
       return $this->model->with('user','channel')->orderBy('minutes','DESC')->get();
    }

    public function selectAll()
    {
        return $this->model->get();
    }

}