<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function show(Job $job)
    {
        return view('jobs.job_show', [
            'job' => $job
        ]);
    }

    public function create()
    {
        $companies = Company::all();

        return view ('jobs.job_create', [
            'companies' => $companies
        ]);
    }
}
