<?php

namespace App\Http\Controllers;

use App\Models\Event_Team;
use Illuminate\Http\Request;

class Event_TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event_team = Event_Team::all();
        return response()->json(["success" => true, "event_team" => $event_team],200);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $sport = Event_Team::store($request);
        // return response()->json(["success" => true, "sprot" => $sport],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
