<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\Companie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function getJobs() {
        $data = DB::table('jobs')
            ->join('companies', 'jobs.companies_id', '=', 'companies.id')
            ->select('jobs.id', 'jobs.title', 'companies.name')
            ->get();
        return response()->json($data);
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
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}