<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use \Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\WatchedTimeService;

class WatchedTimeController extends Controller
{

    protected $watchedTimeService;

    /**
     * Cria uma intancia do service
     *
     * @param \App\Services\ChannelService  $channelService
     */
    public function __construct(WatchedTimeService $watchedTimeService)
    {
        $this->watchedTimeService = $watchedTimeService;
    }

    /**
     * Exibe ranking de tempo assistido ordenado por record de minutos de Usuários
     *
     * @throws Exception $e
     * @throws \Illuminate\Database\QueryException $e
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {   
        try {
            return response()->json($this->watchedTimeService->getRankingByUsers(),200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        } catch (QueryException $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
