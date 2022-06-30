<?php

namespace App\Repositories;
use App\Models\Channel;

class ChannelRepository
{
    protected $model;

    /**
     * Construct
     *
     * @param \App\Models\Channel  $model
     */
    public function __construct(Channel $model)
    {
        return $this->model = $model;
    }

    /**
     * retorna registros de Channels e relacionados passados por parâmetro Attributes
     * 
     * @param $attributes
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function selectRelationAtribbutes($attributes) : Object
    {
       return $this->model->with($attributes)->get();
    }


    /**
     * retorna todos os registros de Channels
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function selectAll() : Object
    {
        return $this->model->get();
    }

}