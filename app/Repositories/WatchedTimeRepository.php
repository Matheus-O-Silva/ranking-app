<?php

namespace App\Repositories;
use App\Models\WatchedTime;

class WatchedTimeRepository
{
    protected $model;

    /**
     * Construct
     *
     * @param \App\Models\WatchedTime  $model
     */
    public function __construct(WatchedTime $model)
    {
        return $this->model = $model;
    }

    /**
     * retorna registros de WatchedTimes e relacionados de Users e Channels
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function selectRelationWithUsersAndChannels() : Object
    {
       return $this->model->with('user','channel')->orderBy('minutes','DESC')->get();
    }

    /**
     * retorna todos os registros de WatchedTimes
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function selectAll(): Object
    {
        return $this->model->get();
    }

}