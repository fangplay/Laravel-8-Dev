<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class betaServer extends Controller
{
    //index route
    function index()
    {
        return view('neo-welcome');
    }
    //generation route
    function generationData()
    {
        $genData = DB::table('generation')->pluck('name');
        // return view('generations',compact('genData'));
        return $genData->toJson();
    }
    //gamelist route
    function gameData()
    {
        $gameList = DB::table('game-list')->join('generation','game-list.gen_id','=','generation.id')->select('game-list.name as gamename','generation.name as genname')->orderBy('gen_id')->get();
        // return view('game-list',compact('gameList'));
        return $gameList->toJson();
    }
    //projects route
    function projects(){
        $projects = DB::table('projects')->join('status','projects.status_id','=','status.id')->select('projects.project_name as pname','status.name as sname')->get();
        // return view('projects',compact('projects'));
        // return betaServer::json_encode(array('success'));
        return $projects->toJson();
    }
    // info route
    function info(){
        return view('info');
    }

    // Release Games
    function release(){
        $release = DB::table('game-list')->select('year as Year','name as GameName')->orderBy('year')->get();
        // return view('release',compact('release'));
        // return view('release');
        return $release->toJson();
    }
}
