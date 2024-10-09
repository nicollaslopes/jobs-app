<?php

namespace App\Http\Services;

use App\Http\Repositories\JobApplicationRepository;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationService
{
    public static function createJobApplication(Request $request): bool
    {
        $user = Auth::user();

        $request->validate([
            'job_id' => 'string|required'
        ]);

        if (!self::canUserApply($request->job_id)) {
            return false;
        }

        return JobApplicationRepository::add([
            'user_id' => $user->id, 
            'job_id' => $request->job_id
        ]);
    }

    public static function canUserApply(string|int $jobId): bool
    {
        $user = Auth::user();

        $hasApplication = Application::where('id_user', $user->id)
                                        ->where('id_job', $jobId)
                                        ->first();

        return $hasApplication == null ? true : false;
    }
}