<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSportRequest;
use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sport = Sport::all();
        return response()->json(["success" => true, "sprots" => $sport],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSportRequest $request)
    {
        $sport = Sport::store($request);
        return response()->json(["success" => true, "sprot" => $sport],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sport = Sport::find($id);
        return response()->json(["success" => true, "sport" => $sport],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSportRequest $request, string $id)
    {
        $sport_id = Sport::find($id);
        $updateSport = $sport_id::store($request,$id);
        return response()->json(["Update successfully" => true, "sport" => $updateSport],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sport_id = Sport::find($id);
        $sport_id->delete();
        return response()->json(["success" => true, "sport" => $sport_id],200);
    }
}
