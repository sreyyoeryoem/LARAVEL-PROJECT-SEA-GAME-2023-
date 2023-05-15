<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        "country",
        "team_members",
        "user_id"
    ];
    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class);
    }
    public static function store($request,$id=null){

        $team = $request->only(["name",
         "country",
         "team_members",
         "user_id"
        ]);
        $team = self::updateOrCreate(['id' => $id], $team);
        return $team;
    }
    
    // ========================================================Relationship========
    public function event()
    {
    return $this->belongsToMany(Event::class,"event_teams")->withTimestamps();
    }

}

