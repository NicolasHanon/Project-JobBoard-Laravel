<?php

namespace App\Http\Controllers;

use App\Models\Companie;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
            $companies = Job::create($request->all());
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
        $company = DB::table('companies')
        ->join('companies', 'jobs.companies_id', '=', 'companies.id')
        ->select('jobs.*', 'companies.name')
        ->where('jobs.id', '=', $id)
        ->get();
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the job by its ID
        $company = Job::findOrFail($id);
        $company->update($request->all());
        return response()->json(["message" => "ça marche"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Job::findOrFail($id);
        $company->delete();
        return response()->json($company, 201);
    }
}
