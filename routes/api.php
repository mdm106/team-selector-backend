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
    Route::get("", [TeamNames::class, "index"]);

});