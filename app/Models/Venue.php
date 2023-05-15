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
        $venue = self::updateOrCreate(['id' => $id], $venue);
    }
    // ================================Relationship================================
    public function even():HasOne
    {
        return $this->hasOne(even::class);
    }
}
