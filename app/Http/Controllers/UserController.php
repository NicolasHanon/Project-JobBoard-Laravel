<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\Companie;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $user = User::create($request->all());
            return response()->json($request, 201);
        }
        catch(\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'ça marche pas'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = DB::table('users')
        ->join('roles', 'users.roleId', '=', 'roles.id')
        ->select('users.*', 'roles.rolename')
        ->where('users.id', '=', $id)
        ->get();
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the job by its ID
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json($user, 201);
    }
}
