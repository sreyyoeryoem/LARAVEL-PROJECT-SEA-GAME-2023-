<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        "match_date",
        "start_time",
        "end_time",
        "description",
        "sport_id",
        "venue_id",
        
    ];

    public static function store($request,$id=null)
    {
        $event = $request->only([
            "name",
            "match_date",
            "start_time", 
            "end_time",
            "description",
            "sport_id",
            "venue_id",
        ]);
        
        $event = self::updateOrCreate(['id' => $id], $event);
        $teams = request('teams');
        $event->teams()->sync($teams);
        return $event;

    }
    // -================================Relation ================================

    public function sport(): BelongsTo
    {
        return $this->belongsTo(Sport::class);
    }
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class,"event__teams")->withTimestamps();
    }
    
}
