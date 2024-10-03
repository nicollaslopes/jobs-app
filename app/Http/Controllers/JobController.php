<?php

namespace App\Http\Controllers;

use App\Http\Services\JobService;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function store(Request $request)
    {
        $job = JobService::createJob($request);

        if (!$job) {
            Alert::error('Error', 'An error occurred while registering, please try again.');
        } else {
            Alert::success('Success', 'Your vacancy has been successfully registered!');
        }

        return redirect()->route('job.create');
    }
}
