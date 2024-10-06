<?php

namespace App\Http\Controllers;

use App\Http\Services\JobApplicationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function show()
    {
        $user = Auth::user();

        $jobs = DB::table('jobs')
                        ->join('applications', 'jobs.id', '=', 'applications.id_job')
                        ->join('companies', 'companies.id', '=', 'jobs.id_company')
                        ->where('id_user', $user->id)
                        ->get();

        return view('applications.application_show', [
            'jobs' => $jobs
        ]);
    }
}
