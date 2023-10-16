<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Créer un nouveau champ dans la table "jobs"
     */
    public function store(Request $request)
    {
        try{
            $jobs = Job::create($request->all());
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
    public function show(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $job = Job::findOrFail($id);
            $job->delete();
            return response()->json($job, 201);
        }
        catch(\Illuminate\Database\QueryException $e) { // je sais pas si c est la bonne erreur
            return response()->json([
                'message' => 'ça marche pas'], 500);
        }
    }
}
