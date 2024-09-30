<?php

namespace App\Http\Services;

use App\Http\Repositories\JobApplicationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationService
{
    public static function createJobApplication(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'job_id' => 'string|required'
        ]);

        JobApplicationRepository::add([
            'user_id' => $user->id, 
            'job_id' => $request->job_id
        ]);

    }
}