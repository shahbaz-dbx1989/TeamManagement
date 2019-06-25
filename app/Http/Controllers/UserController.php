<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveUser;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::with('teams')->get();
        //return $users;
        return view ('web.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = \App\Team::all();
        return view('web.users.create',['teams'=>$teams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUser $request)
    {
        $user = new \App\User;
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $teams = $request->get('teams');
        
        //saving email and password just dummy , 
        //as not removed the columns because may be we 
        // need to do the task further
        $user->email = Str::random(8) . '@yahoo.com';
        $user->password = bcrypt('password123');

        if($user->save())
        {
            $user->teams()->sync($teams);            
            return redirect()
            ->route('users.create')
            ->with('message', $user->first_name . ' is created!');            
        }
        else
        {
            $errors = $user->getErrors();
            return redirect()->route('users.create')->with('errors', $errors)->withInput(); 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
