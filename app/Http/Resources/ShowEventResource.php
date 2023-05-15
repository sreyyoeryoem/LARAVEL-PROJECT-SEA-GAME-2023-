<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
    //   dd($this->tickes);

        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "match_date"=>$this->match_date,
            "start_time"=>$this->start_time,
            "end_time"=>$this->end_time,
            "description"=>$this->description,
            "venue "=>$this->venue,
            "ticket" =>$this->tickets,
            'teams' =>TeamResource::collection($this->teams)
        ];
    }
}
