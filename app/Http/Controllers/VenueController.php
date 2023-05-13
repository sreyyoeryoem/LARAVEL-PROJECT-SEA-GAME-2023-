<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVenueRequest;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venue::all();
        return response()->json(["success" => true, "venues" => $venues],200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVenueRequest $request)
    {
        $venues = Venue::store($request);
        return response()->json(["success" => true, "venues" => $venues],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venue = Venue::find($id);
        return response()->json(["success" => true, "venues" => $venue],200);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreVenueRequest $request, string $id)
    {
        $venue_id = Venue::find($id);
        $updateVenue = $venue_id::store($request,$id);
        return response()->json(["Update successfully" => true, "venues" => $updateVenue],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venue_id = Venue::find($id);
        $venue_id->delete();
        return response()->json(["success" => true, "venue" => $venue_id],200);
    }
}
