<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use \Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\ChannelService;

/**
 * Exibe ranking de tempo assistido por usuários agrupado por Canais
 *
 * @throws Exception $e
 * @throws \Illuminate\Database\QueryException $e
 * @return \Illuminate\Http\JsonResponse
 */
class ChannelController extends Controller
{

    protected $channelService;

    /**
     * Cria uma intancia do service
     *
     * @param \App\Services\ChannelService  $channelService
     */
    public function __construct(ChannelService $channelService)
    {
        $this->channelService = $channelService;
    }

    /**
     * Exibe ranking de minutos assistidos de Usuários agrupados por Canal
     *
     * @throws Exception $e
     * @throws \Illuminate\Database\QueryException $e
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {   
        try {
            return response()->json($this->channelService->getRankingByChannel(),200);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        } catch (QueryException $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
