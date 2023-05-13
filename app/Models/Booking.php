<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'match_date',
        "user_id",
        "sport_id",
        "zone_id"
    ];
   
    public static function store($request,$id=null){

        $booking = $request->only(["match_date", "user_id","sport_id","zone_id"]);
       
        if ($id) {
            
            
                    $data = self::updateOrCreate(['id' => $id], $booking);
                }
        else {
         
                    $data = self::create($booking);
                    $id = $data->id; 
                }
        return $booking;
    }

    // ==================================Relationship==============================
    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class);
    }

    public function sport(): BelongsTo
    {
    return $this->belongsTo(Sport::class);
    }
    public function zone(): BelongsTo
    {
    return $this->belongsTo(Zone::class);
    }
}
