<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function show()
    {
        $jobsCompany = DB::table('jobs')
                    ->join('companies', 'companies.id', '=', 'jobs.id_company')
                    ->get();
                    
        return view('dashboard', [
            'jobsCompany' => $jobsCompany
        ]);
    }
}
