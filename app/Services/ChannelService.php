<?php

namespace App\Services;
use App\Repositories\ChannelRepository;

class ChannelService
{
    private $channelRepository;

    /**
     * construct
     *
     * @param \App\Repositories\ChannelRepository $channelRepository 
     */
    public function __construct(ChannelRepository $channelRepository)
    {
        return $this->channelRepository = $channelRepository;
    }

    public function getRankingByChannel()
    {
        $channels = $this->channelRepository->selectRelationAtribbutes('WatchedTimes.user')->toArray();
        
        foreach($channels as $key => $value){
            //Ordena do maior colocado para o menor 
            usort($channels[$key]['watched_times'], function($a, $b) {
                return $a['minutes'] < $b['minutes'];
            });
            
            //Inclui posição do usuário no ranking   
            $i = 1;                       
            foreach($channels[$key]['watched_times'] as $watchedKey => $value){
                if(intval($watchedKey) !== 0){
                    if($channels[$key]['watched_times'][$watchedKey]['minutes'] < $channels[$key]['watched_times'][$watchedKey - 1]['minutes']){
                        $i++;
                    }
                }

                $channels[$key]['watched_times'][$watchedKey]['place'] = $i;               
            }                                          
        }

        return $channels;
    }


}