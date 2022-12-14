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
        return view('generations',compact('genData'));
    }
    //gamelist route
    function gameData()
    {
        $gameList = DB::table('game-list')->join('generation','game-list.gen_id','=','generation.id')->select('game-list.name as gamename','generation.name as genname')->orderBy('gen_id')->get();
        return view('game-list',compact('gameList'));
    }
    //projects route
    function projects(){
        $projects = DB::table('projects')->join('status','projects.status_id','=','status.id')->select('projects.project_name as pname','status.name as sname')->get();
        return view('projects',compact('projects'));
        // return betaServer::json_encode(array('success'));
    }
    // info route
    function info(){
        return view('info');
    }
}
