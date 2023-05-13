<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

        $team = $request->only(["name", "country","team_members","user_id"]);
       
        if ($id) {
            
            
                    $data = self::updateOrCreate(['id' => $id], $team);
                }
        else {
         
                    $data = self::create($team);
                    $id = $data->id; 
                }
        return $team;
    }
    

}

