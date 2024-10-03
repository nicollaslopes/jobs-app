<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Repositories\JobRepository;

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

        return JobRepository::add($request);
    }
}