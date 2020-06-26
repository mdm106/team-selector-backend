<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//using Game model
use App\Game;
//using Game resource
use App\Http\Resources\API\GameResource;

class Games extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all()->sortBy('game_date');
        //get all the games
        return GameResource::collection($games);
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

        // creates game with the data and stores in DB
        $game = Game::create($data);
        // return new game as resource
        return new GameResource($game);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return new GameResource($game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        // get the request data
        $data = $request->all();

        // update the game using the fill method then save in database
        $game->fill($data)->save();

        // return the updated version as resource
        return new GameResource($game);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        // delete the game from the DB
        $game->delete();

        // use a 204 code as no content in response
        return response(null, 204);
    }
}
