<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use \Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Channel;
use App\Models\WatchedTime;

/**
 * Exibe ranking de tempo assistido
 *
 * @throws Exception $e
 * @throws Illuminate\Database\QueryException $e
 * @return \Illuminate\Http\JsonResponse
 */
class RankingController extends Controller
{
    public function index() : JsonResponse
    {
        //$users = User::with('Channels')->get();
        $users = User::all();
        /*
        $users = Channel::all();
        foreach($users as $user){
            $user->users = User::find($user->id);
        }
        */

        //$users = WatchedTime::with('user')->get();

        return response()->json($users);
    }
}
