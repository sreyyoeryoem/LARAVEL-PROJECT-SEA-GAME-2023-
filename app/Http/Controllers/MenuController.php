<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenueRequest;
use App\Http\Requests\StorZoneRequest;
use App\Models\Menu;
use App\Models\Zone;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::all();
        return response()->json(["success" => true, "Menu" => $menu],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenueRequest $request)

    {
        $menu = Menu::store($request);
        return response()->json(["success" => true, "zone" => $menu],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu_id = Menu::find($id);
        return response()->json(["success" => true, "menu" => $menu_id],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu_id = Menu::find($id);
        $menu_update = $menu_id::store($request,$id);
        return response()->json(["success" => true, "menu" => $menu_update],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu_id = Menu::find($id);
        $menu_id->delete();
        return response()->json(["success" => true, "menu" => $menu_id],200);
    }
}
