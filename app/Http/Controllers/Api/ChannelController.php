<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use \Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Channel;

/**
 * Exibe ranking de tempo assistido por Canais
 *
 * @throws Exception $e
 * @throws \Illuminate\Database\QueryException $e
 * @return \Illuminate\Http\JsonResponse
 */
class ChannelController extends Controller
{
    public function index() : JsonResponse
    {   
        
        $channels = Channel::with('WatchedTimes.user')->get()->toArray();
        
        foreach($channels as $key => $value){
            //Ordena do maior colocado para o menor 
            usort($channels[$key]['watched_times'], function($a, $b) {
                return $a['minutes'] < $b['minutes'];
            });
            
            //Inclui posição do usuário no ranking   
            $i = 1;//Quantidade de posições                           
            foreach($channels[$key]['watched_times'] as $watchedKey => $value){
                if(intval($watchedKey) !== 0){
                    if($channels[$key]['watched_times'][$watchedKey]['minutes'] < $channels[$key]['watched_times'][$watchedKey - 1]['minutes']){
                        $i++;
                    }
                }

                $channels[$key]['watched_times'][$watchedKey]['place'] = $i;               
            }                                          
        }
        
        return response()->json($channels,200);
    }
}
