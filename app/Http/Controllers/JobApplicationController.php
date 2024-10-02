<?php

namespace App\Http\Controllers;

use App\Http\Services\JobApplicationService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobApplicationController extends Controller
{
    public function create(Request $request)
    {
        $application = JobApplicationService::createJobApplication($request);

        if (!$application) {
            Alert::error('Error', 'You have already applied for this position!');
        } else {
            Alert::success('Success', 'Your application has been submitted!');
        }

        return redirect()->route('job.show', $request->job_id);
    }
}
