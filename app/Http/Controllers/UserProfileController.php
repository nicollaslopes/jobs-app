<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\TechnologiesEnum;
use App\Http\Services\UserProfileService;
use App\Models\UserTechnology;

class UserProfileController extends Controller
{
    public function show()
    {
        $techs = TechnologiesEnum::cases();

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
