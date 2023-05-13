<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorZoneRequest;
use App\Models\Zone;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zone = Zone::all();
        return response()->json(["success" => true, "zone" => $zone],200);

    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorZoneRequest $request)
    {
        $zone = Zone::store($request);
        return response()->json(["success" => true, "zone" => $zone],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $zone_id = Zone::find($id);
        return response()->json(["success" => true, "zone" => $zone_id],200);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorZoneRequest $request, string $id)
    {
        $zone_id = Zone::find($id);
        $zone_update = $zone_id::store($request,$id);
        return response()->json(["success" => true, "zone" => $zone_update],200);



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $zone_id = Zone::find($id);
        $zone_id->delete();
        return response()->json(["success" => true, "zone" => $zone_id],200);

        
        
    }
}
