<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvenRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\ShowEventResource;
use App\Models\Event;
use App\Models\Sport;
use Illuminate\Http\Request;


class EvenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::all();
        $vent_name = request("name");
        $event = Event::where("name","like","%".$vent_name."%")->get();
        $event = EventResource::collection($event);
        return response()->json(["success" => true, "event" => $event],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvenRequest $request)
    {
     
        $event = Event::store($request);
        return response()->json(["success" => true, "Event" => $event],201);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event_id = Event::find($id);
        $event = new ShowEventResource($event_id);
        return response()->json(["success" => true, "event" => $event],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event_id = Event::find($id);
        $updateEvent = $event_id::store($request,$id);
        return response()->json(["Update successfully" => true, "Event" => $updateEvent],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event_id = Event::find($id);
        $event_id->delete();
        return response()->json(["success" => true, "event" => $event_id],200);
    }
    
}
