<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvenRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\ShowEventResource;
use App\Models\even;
use App\Models\Sport;
use Illuminate\Http\Request;
use PHPUnit\Event\Event;

class EvenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $event = even::all();
        $event = EventResource::collection($event);
        return response()->json(["success" => true, "event" => $event],200);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvenRequest $request)
    {
       
      
        $even = even::store($request);
        return response()->json(["success" => true, "event" => $even],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = even::find($id);
        $event = new ShowEventResource($event);
        return response()->json(["success" => true, "event" => $event],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event_id = even::find($id);
        $updateEvent = $event_id::store($request,$id);
        return response()->json(["Update successfully" => true, "Event" => $updateEvent],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event_id = even::find($id);
        $event_id->delete();
        return response()->json(["success" => true, "event" => $event_id],200);
    }
    
}
