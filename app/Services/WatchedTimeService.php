<?php

namespace App\Services;
use App\Repositories\WatchedTimeRepository;

class WatchedTimeService
{
    private $watchedTimeRepository;

    /**
     * Construct
     *
     * @param \App\Repositories\WatchedTimeRepository $watchedTimeRepository 
     */
    public function __construct(WatchedTimeRepository $watchedTimeRepository)
    {
        return $this->watchedTimeRepository = $watchedTimeRepository;
    }

    /**
     * retorna lista de usuários ordenada do maior tempo assistido para o menor
     * 
     * @return Object
     */
    public function getRankingByUsers() : Object
    {
        $watchedTimes = $this->watchedTimeRepository->selectRelationWithUsersAndChannels();
        
        //Inclui posição do usuário no ranking 
        $i = 1;
        foreach($watchedTimes as $key => $value){
            if(intval($key) !== 0 && $watchedTimes[$key]->minutes < $watchedTimes[$key - 1]->minutes){
                $i++;
            }    
            $watchedTimes[$key]->place = $i;                                               
        }
        
        return $watchedTimes;
    }


}