<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//using TeamNames model
use App\TeamName;

class TeamNames extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //get all the team names
        return TeamName::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // returns an array of all data user sent in request
        $data = $request->all();

        // creates team name with the data and stores in DB
        // returns JSON response
        return TeamName::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TeamName $teamName)
    {
        // return team name with specific id
        return $teamName;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamName $teamName)
    {
        // get the request data
        $data = $request->all();

        // update the team name using the fill method then save in database
        $teamName->fill($data)->save();

        // return the updated version
        return $teamName;
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
