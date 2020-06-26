<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ["game_date", "team_1", "team_2", "team_1_score", "team_2_score"];
}
