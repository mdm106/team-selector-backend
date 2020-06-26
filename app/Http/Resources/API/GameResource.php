<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "game_date" => $this->game_date,
            "team_1" => $this->team_1,
            "team_2" => $this->team_2,
            "team_1_score" => $this->team_1_score,
            "team_2_score" => $this->team_2_score,
            "game_complete" => $this->game_complete,
        ];
    }
}
