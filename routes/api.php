<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\EvenController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\Teamcontroller;
use App\Http\Controllers\TicketControler;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\ZoneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// ===================================User=====================================
Route::get("/users",[UserController::class,"index"]);
Route::post("/users",[UserController::class,"store"]);
Route::get("/users/{id}",[UserController::class,"show"]);
Route::put("/users/{id}",[UserController::class,"update"]);
Route::delete("/users/{id}",[UserController::class,"destroy"]);


// ===================================Zone=====================================
Route::get("/zone",[ZoneController::class,"index"]);
Route::post("/zone",[ZoneController::class,"store"]);
Route::get("/zone/{id}",[ZoneController::class,"show"]);
Route::put("/zone/{id}",[ZoneController::class,"update"]);
Route::delete("/zone/{id}",[ZoneController::class,"destroy"]);

// ===================================Venue=====================================
Route::get("/venue",[VenueController::class,"index"]);
Route::post("/venue",[VenueController::class,"store"]);
Route::get("/venue/{id}",[VenueController::class,"show"]);
Route::put("/venue/{id}",[VenueController::class,"update"]);
Route::delete("/venue/{id}",[VenueController::class,"destroy"]);

// ===================================Sprot=====================================
Route::get("/sport",[SportController::class,"index"]);
Route::post("/sport",[SportController::class,"store"]);
Route::get("/sport/{id}",[SportController::class,"show"]);
Route::put("/sport/{id}",[SportController::class,"update"]);
Route::delete("/sport/{id}",[SportController::class,"destroy"]);

// ===================================Team=====================================
Route::get("/team",[Teamcontroller::class,"index"]);
Route::post("/team",[Teamcontroller::class,"store"]);
// Route::get("/team/{id}",[SportController::class,"show"]);
Route::put("/team/{id}",[SportController::class,"update"]);
// Route::delete("/team/{id}",[SportController::class,"destroy"]);

// ===================================Booking=====================================
Route::get("/booking",[BookingController::class,"index"]);
Route::post("/booking",[BookingController::class,"store"]);
Route::get("/booking/{id}",[BookingController::class,"show"]);
Route::put("/booking/{id}",[BookingController::class,"update"]);
// Route::delete("/team/{id}",[BookingController::class,"destroy"]);

// ===================================Ticket=====================================
Route::get("/ticket",[TicketControler::class,"index"]);
Route::post("/ticket",[TicketControler::class,"store"]);
Route::get("/ticket/{id}",[TicketControler::class,"show"]);
Route::put("/ticket/{id}",[TicketControler::class,"update"]);
// Route::delete("/team/{id}",[BookingController::class,"destroy"]);

// ===================================Event=====================================
Route::get("/event",[EvenController::class,"index"]);
Route::post("/event",[EvenController::class,"store"]);
Route::get("/event/{id}",[EvenController::class,"show"]);
Route::put("/event/{id}",[EvenController::class,"update"]);
Route::delete("/event/{id}",[EvenController::class,"destroy"]);