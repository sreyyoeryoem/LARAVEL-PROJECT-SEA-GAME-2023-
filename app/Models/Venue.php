<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
