<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\JobInterface;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobRepository implements JobInterface
{
    public static function add($request): bool
    {
        $user = Auth::user();

        try {
            Job::create([
                'id_company' => $request->company,
                'id_recruiter' => $user->id,
                'title' => $request->job_title,
                'salary' => $request->salary,
                'city' => $request->city,
                'state' => $request->state,
                'description' => $request->description,
                'publish_date' => now()
            ]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}