<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $jobs = Job::all();

        $companies = [];

        foreach ($jobs as $job) {
            $companies[] = Job::find($job->id)->companies;
        }

        return view('dashboard', [
            'jobs' => $jobs,
            'companies' => $companies
        ]);
    }
}
