<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public static function store($request,$id=null)
    {
        
        $zone = $request->only(["name"]);
   
        if ($id) {

                   
                    $data = self::updateOrCreate(['id' => $id], $zone);
                    
                }
        else {
                    // dd(1);
                    $data = self::create($zone);
                    $id = $data->id;
                    
                }
        return $zone;
    }

    
}

