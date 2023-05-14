<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Venue extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public static function store($request,$id=null)
    {
        $venue = $request->only(["name"]);
        if ($id) {
                    $data = self::updateOrCreate(['id' => $id], $venue);
                }
        else {
                    $data = self::create($venue);
                    $id = $data->id;
                }
        return $venue;
    }
    // ================================Relationship================================
    public function even():HasOne
    {
        return $this->hasOne(even::class);
    }
}
