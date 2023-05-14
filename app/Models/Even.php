<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class even extends Model
{
    use HasFactory;
    protected $fillable = [
        "match_date",
        "Description",
        "sport_id",
        "venue_id",
    ];
    public static function store($request,$id=null){

        $event = $request->only(["match_date", "Description","sport_id", "venue_id"]);
       
        if ($id) {
                    $data = self::updateOrCreate(['id' => $id], $event);
                }
        else {
                    $data = self::create($event);
                    $id = $data->id; 
                }
        return $event;
    }

    // ===========================================Relation======================================================================
    public function sport(): BelongsTo
    {
    return $this->belongsTo(Sport::class);
    }
    public function venue(): BelongsTo
    {
    return $this->belongsTo(Venue::class);
    }
}
