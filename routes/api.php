<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use TeamNames controller
use App\Http\Controllers\API\TeamNames;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware("auth:api")->get("/user", function (Request $request) {
    return $request->user();
});


Route::group(["prefix" => "/team-names"], function () {

    // array syntax used to point to controller
    // GET /team-names: show all team names
    Route::get("", [TeamNames::class, "index"]);

    // POST /team-names: create a new team name
    Route::post("", [TeamNames::class, "store"]);

    // GET /random: shows two random names
    Route::get("/random", [TeamNames::class, "showRandom"]);

    // following routes also have a name ID in the end-point
    Route::group(["prefix" => "{teamName}"], function () {
        // GET /team-names/id: show the team name
        Route::get("", [TeamNames::class, "show"]);

        // PUT /team-names/id: update the team name
        Route::put("", [TeamNames::class, "update"]);

        // DELETE /team-names/id: delete the team name
        Route::delete("", [TeamNames::class, "destroy"]);
    });

});

Route::group(["prefix" => "/games"], function () {

    // array syntax used to point to controller
    // GET /team-names: show all games
    Route::get("", [Games::class, "index"]);

    // POST /team-names: create a new game
    Route::post("", [Games::class, "store"]);

    // following routes also have a game ID in the end-point
    Route::group(["prefix" => "{game}"], function () {
        // GET /games/id: show the game
        Route::get("", [Games::class, "show"]);

        // PUT /games/id: update the game
        Route::put("", [Games::class, "update"]);

        // DELETE /team-names/id: delete the team name
        Route::delete("", [Games::class, "destroy"]);
    });

});