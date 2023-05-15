<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'event_id',
    ];

   

    public static function store($request,$id=null)
    {
        $ticket = $request->only(["booking_id", "event_id"]);
        if ($id) {
                    $data = self::updateOrCreate(['id' => $id], $ticket);
                }
        else {
                    $data = self::create($ticket);
                    $id = $data->id;
                }
        return $ticket;
    }

    // ===========================Relationship=====================
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
