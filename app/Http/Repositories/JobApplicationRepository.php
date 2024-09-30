<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\JobApplicationInterface;
use App\Models\Application;

class JobApplicationRepository implements JobApplicationInterface
{
    public static function add(array $data): bool
    {
        try {
            Application::create([
                'id_user' => $data['user_id'],
                'id_job' => $data['job_id'],
                'status' => true
            ]);

            return true;

        } catch (\Throwable $th) {
            return false;
        }
    }
}