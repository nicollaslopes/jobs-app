<?php

namespace App\Http\Controllers;

use App\Http\Services\JobApplicationService;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function create(Request $request)
    {
        JobApplicationService::createJobApplication($request);

        return redirect()->route('jobs.show', $request->job_id);
        
    }
}
