<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Repositories\JobRepository;
use Illuminate\Support\Facades\Auth;

class JobService
{
    public static function createJob(Request $request)
    {
        $request->validate([
            'company' => 'string|required',
            'job_title' => 'string|required',
            'salary' => 'string|required',
            'city' => 'string|required',
            'state' => 'string|required',
            'description' => 'string|required',
        ]);

        if (!self::isRecruiter()) {
            return false;
        }

        return JobRepository::add($request);
    }

    public static function isRecruiter()
    {
        $user = Auth::user();

        if ($user->role == 'recruiter') {
            return true;
        } 

        return false;
    }
}