<?php

namespace App\Repositories;
use App\Models\Channel;

class ChannelRepository
{
    protected $model;

    public function __construct(Channel $model)
    {
        return $this->model = $model;
    }

    public function selectRelationAtribbutes($attributes)
    {
       return $this->model->with($attributes)->get();
    }

    public function selectAll()
    {
        return $this->model->get();
    }

}