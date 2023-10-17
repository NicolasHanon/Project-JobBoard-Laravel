<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\Companie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function show($id)
    {       
        $job = DB::table('jobs')
        ->join('companies', 'jobs.companies_id', '=', 'companies.id')
        ->select('jobs.*', 'companies.name')
        ->where('jobs.id', '=', $id)
        ->get();
        return response()->json($job);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the job by its ID
        $job = Job::find($id);

        // Check if the job exists
        if (!$job) {
            return response()->json(["message" => "ça a pas marcher..."]);
        }

        $job->update($request->all());
        return response()->json(["message" => "ça marche"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return response()->json($job, 201);
    }
}
