<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sport extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

   

    public static function store($request,$id=null)
    {
        $sport = $request->only(["name"]);
        if ($id) {
                    $data = self::updateOrCreate(['id' => $id], $sport);
                }
        else {
                    $data = self::create($sport);
                    $id = $data->id;
                }
        return $sport;
    }
    // ======================Relations =============================
    public function booking():HasOne
    {
        return $this->hasOne(Booking::class);
    }
    public function even():HasOne
    {
        return $this->hasOne(even::class);
    }
}
