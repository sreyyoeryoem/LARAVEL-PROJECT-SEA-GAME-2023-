<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BokingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
   
        return [
            "id"=>$this->id,
            "match_date"=>$this->match_date,
            "create by"=>$this->user,
            "Sport"=>$this->sport,
            "Zone "=>$this->zone
            
        ];
    }
}
