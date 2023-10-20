<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Application;

class ApplicationController extends Controller
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
            $applications = Application::create($request->all());
            return response()->json($request, 201);
        }
        catch(\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'error'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {       
        $application = DB::table('applications')
        ->join('jobs', 'jobs.id', '=', 'applications.user_id')
        ->join('users', 'users.id', '=', 'applications.user_id')
        ->select('applications.*', 'jobs.title', 'users.name')
        ->where('applications.id', '=', $id)
        ->get();
        return response()->json($application);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the job by its ID
        $application = Application::findOrFail($id);
        $application->update($request->all());
        return response()->json($application);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        return response()->json($application, 201);
    }

    public function getApplyJob($userId) {
        $data = DB::table('applications')
            ->join('jobs', 'jobs.id', '=', 'applications.jobs_id')
            ->join('companies', 'jobs.companies_id', '=', 'companies.id')
            ->select('jobs.id', 'jobs.title', 'companies.name')
            ->where('applications.user_id', '=', $userId)
            ->get();
        return response()->json($data);
    }

    public function getApplyData($userId, $jobId) {
        $data = DB::table('applications')
            ->select('applications.message', 'applications.is_accepted')
            ->where('applications.user_id', '=', $userId)
            ->where('applications.jobs_id', '=', $jobId)
            ->get();
        return response()->json($data);
    }

    public function updateMessage(Request $request, $userId, $jobId) {
        $data = $request->post();
        $data = DB::table('applications')
            ->select('applications.message')
            ->where('applications.user_id', '=', $userId)
            ->where('applications.jobs_id', '=', $jobId)
            ->update($data);
    }

}
