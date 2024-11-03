<?php

namespace App\Http\Controllers;

use App\Http\Services\UserProfileService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatesController extends Controller
{
    public function list()
    {
        $candidates = DB::table('users')
                                ->where('role', 'user')
                                ->paginate(12);

        return view('candidates.index', [
            'candidates' => $candidates
        ]);
    }

    public function show(User $user)
    {
        $userTechs =  UserProfileService::getUserTechnologiesById($user->id);

        return view('candidates.show',  [
            'candidate' => $user,
            'userTechs' => $userTechs
        ]);
    }
}
