<?php

use App\Http\Controllers\MenuController;
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
Route::get("/users",[ZoneController::class,"index"]);
Route::post("/users",[ZoneController::class,"store"]);
Route::get("/users/{id}",[ZoneController::class,"show"]);
Route::put("/users/{id}",[ZoneController::class,"update"]);
Route::delete("/users/{id}",[ZoneController::class,"destroy"]);


// ===================================Zone=====================================
Route::get("/zone",[ZoneController::class,"index"]);
Route::post("/zone",[ZoneController::class,"store"]);
Route::get("/zone/{id}",[ZoneController::class,"show"]);
Route::put("/zone/{id}",[ZoneController::class,"update"]);
Route::delete("/zone/{id}",[ZoneController::class,"destroy"]);

// ===================================Menu=====================================
Route::get("/menu",[MenuController::class,"index"]);
Route::post("/menu",[MenuController::class,"store"]);
Route::get("/menu/{id}",[MenuController::class,"show"]);
Route::put("/menu/{id}",[MenuController::class,"update"]);
Route::delete("/menu/{id}",[MenuController::class,"destroy"]);