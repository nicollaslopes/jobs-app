<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\TechnologiesEnum;

class UserProfile extends Controller
{
    public function show()
    {
        $techs = TechnologiesEnum::cases();

        return view('my-profile.index', [
            'techs' => $techs
        ]);
    }
}
