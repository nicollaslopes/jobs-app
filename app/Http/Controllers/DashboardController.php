<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function show()
    {
        $jobsCompany = DB::table('companies')
                    ->join('jobs', 'companies.id', '=', 'jobs.id_company')
                    ->orderBy('jobs.id')
                    ->paginate(9);
                    
        return view('dashboard', [
            'jobsCompany' => $jobsCompany
        ]);
    }
}
