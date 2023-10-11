<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Companie;

class IndexController extends Controller
{
    public function show()
    {
        $companies = Companie::all();
        $jobs = Job::all();
        return view('index', compact('companies', 'jobs'));
    }
}
