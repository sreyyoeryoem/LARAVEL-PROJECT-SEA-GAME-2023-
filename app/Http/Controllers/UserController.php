<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserReequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Backtrace\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(1);
        $users = User::all();
        return response()->json(["success" => true, "users" => $users],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
      
        $user = User::store($request);
        return response()->json(["success" => true, "users" => $user],201);
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json(["success" => true, "users" => $user],200);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
    {
        $idUser = User::find($id);
        $updateUser = $idUser::store($request,$id);
        return response()->json(["Update successfully" => true, "users" => $updateUser],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    //    $iduser = User::find($id);
      
    //    $deleteUser = $iduser::delete();
    //    dd($deleteUser);
    //     return response()->json(["success" => true, "users" => $deleteUser],200);
        $user = User::where('id', $id)->first(); // User::find($id)

        if($user) {
        
            $user->delete();
        return response()->json([" delete successfully " => true],200);

        }
        
    }
}
