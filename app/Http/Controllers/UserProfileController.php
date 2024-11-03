<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserProfileService;

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
