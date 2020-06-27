<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//using TeamNames model
use App\TeamName;
//using TeamNames resource
use App\Http\Resources\API\TeamNameResource;

class TeamNames extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $teamNames = TeamName::all();
        //get all the team names
        return TeamNameResource::collection($teamNames);
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
        $teamName = TeamName::create($data);
        // return new teamname as resource
        return new TeamNameResource($teamName);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TeamName $teamName)
    {
        // return team name with specific id using resource
        return new TeamNameResource($teamName);
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

        // return the updated version as resource
        return new TeamNameResource($teamName);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamName $teamName)
    {
        // delete the team name from the DB
        $teamName->delete();

        // use a 204 code as no content in response
        return response(null, 204);
    }

    public function showRandom()
    {   
        $teamNames = TeamName::all()->random(2);
        //get all the team names
        return TeamNameResource::collection($teamNames);
    }
}
