<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class Teamcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = Team::all();
        $team = TeamResource::collection($team);
        return response()->json(["success" => true, "team" => $team],200);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        
        $team = Team::store($request);
        return response()->json(["success" => true, "team" => $team],201);
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
        $team_id = Team::find($id);
        $updaTeam = $team_id::store($request,$id);
        return response()->json(["Update successfully" => true, "team" => $updaTeam],200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
