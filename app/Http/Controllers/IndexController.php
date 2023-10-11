<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Job;
use App\Models\Companie;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('jobs')
                    ->join('companies', 'jobs.companies_id', '=', 'companies.id')
                    ->select('jobs.*', 'companies.name')
                    ->get();
        return view('index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {       
        $data = DB::table('jobs')
                ->join('companies', 'jobs.companies_id', '=', 'companies.id')
                ->select('jobs.*', 'companies.name')
                ->where('id', '=', $id)
                ->get();
        return $data;
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