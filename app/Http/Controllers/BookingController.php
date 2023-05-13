<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\BokingResource;
use App\Http\Resources\showBokingResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::all();
        $booking = BokingResource::collection($booking);
        return response()->json(["success" => true, "booking" => $booking],200);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        // dd(1);
        $team = Booking::store($request);
        return response()->json(["success" => true, "team" => $team],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $bookingId = Booking::find($id);
        $booking = new showBokingResource($bookingId);
        return response()->json(["success" => true, "get booking by id" => $booking],200);
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
