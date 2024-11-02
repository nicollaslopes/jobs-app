<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\TechnologiesEnum;
use App\Http\Services\UserProfileService;
use App\Models\UserTechnology;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function show()
    {
        $techs = UserProfileService::getUserTechnologies();

        return view('my-profile.index', [
            'techs' => $techs
        ]);
    }

    public function store(Request $request)
    {
        UserProfileService::create($request);

        return redirect()->route('my.profile.show');
    }
}
