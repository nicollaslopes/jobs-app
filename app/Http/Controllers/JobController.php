<?php

namespace App\Http\Controllers;

use App\Http\Services\JobService;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobController extends Controller
{
    public function show(Job $job)
    {
        $jobSalary = '$' . number_format($job->salary, 2, ',', '.');
        
        $job = Job::find($job->id);
        
        return view('jobs.job_show', [
            'job' => $job,
            'job_salary' => $jobSalary,
            'recruiter' => User::find($job->id_recruiter)
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
