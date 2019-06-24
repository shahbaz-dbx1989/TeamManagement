<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveTeam;


class TeamController extends Controller
{
    public function create()
    {
    	$team = new \App\Team;
    	return view('web.teams.create',['team'=>$team]);
    }

    public function store(Saveteam $request)
    {
    	$team = new \App\Team;
    	$team->name = $request->get('name');
    	$team->save();

    	return redirect()
        ->route('teams.create')
        ->with('message', $team->name . ' is created!');

    }
}
