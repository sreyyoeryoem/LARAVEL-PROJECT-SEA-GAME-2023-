<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_id',
        "event_id"
    ];

    public static function store($request,$id=null)
    {
        $event_team = $request->only(["event_id", "team_id"]);
        $event_team = self::updateOrCreate(['id' => $id], $event_team);
        return $event_team;
    }
}
