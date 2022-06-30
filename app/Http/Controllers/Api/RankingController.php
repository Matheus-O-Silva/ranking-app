<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use \Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\WatchedTime;

/**
 * Exibe ranking de tempo assistido por Canais
 *
 * @throws Exception $e
 * @throws \Illuminate\Database\QueryException $e
 * @return \Illuminate\Http\JsonResponse
 */
class RankingController extends Controller
{
    public function index() : JsonResponse
    {   
        
        $channels = Channel::all();

        foreach($channels as $key => $value){
            $channels[$key]->watchedTimes = WatchedTime::where("channel_id",$channels[$key]->id)
                                                        ->with('user','channel')->orderBy('minutes','DESC')->get();

            //Inclui posição do usuário no ranking   
            $i = 1;//Quantidade de posições                           
            foreach($channels[$key]->watchedTimes as $watchedKey => $value){
                if(intval($watchedKey) !== 0){
                    if($channels[$key]->watchedTimes[$watchedKey]->minutes < $channels[$key]->watchedTimes[$watchedKey - 1]->minutes){
                        $i++;
                    }
                }

                $channels[$key]->watchedTimes[$watchedKey]->place = $i;                
            }                                                      
        }
        
        return response()->json($channels,200);
    }

    /**
     * Exibe ranking de tempo assistido por Usuários
     *
     * @throws Exception $e
     * @throws \Illuminate\Database\QueryException $e
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserRanking() : JsonResponse
    {    
        $watchedTimes = WatchedTime::with('user','channel')->orderBy('minutes','DESC')->get();

        $i = 1;//Quantidade de posições no ranking   
        
        //Inclui posição do usuário no ranking 
        foreach($watchedTimes as $key => $value){
            if(intval($key) !== 0 && $watchedTimes[$key]->minutes < $watchedTimes[$key - 1]->minutes){
                $i++;
            }    
            $watchedTimes[$key]->place = $i;                                               
        }
        
        return response()->json($watchedTimes,200);
    }
}
