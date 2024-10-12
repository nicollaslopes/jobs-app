<?php

namespace App\Http\Services;

use App\Http\Repositories\UserProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileService
{
    public static function create(Request $request)
    {
        $request->validate([
            'level' => 'string|required',
            'technologies' => 'array|required',
        ]);

        UserProfileRepository::add($request);
    }
}