<?php

namespace App\Http\Services;

use App\Enums\TechnologiesEnum;
use App\Http\Repositories\UserProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProfileService
{
    public static function create(Request $request)
    {
        $request->validate([
            'technologies' => 'array|required',
        ]);

        UserProfileRepository::destroy($request);
        UserProfileRepository::add($request);
    }

    public static function getUserTechnologies()
    {
        $techs = TechnologiesEnum::cases();

        $user = Auth::user();

        $userTechs = DB::table('user_technologies')
                                    ->select('name')
                                    ->where('id_user', $user->id)
                                    ->get();
                 
        $userTechs = $userTechs->pluck('name')->toArray();

        return array_map(function($tech) use ($userTechs) {
            return [
                'name' => $tech->name,
                'value' => $tech->value,
                'checked' => in_array($tech->name, $userTechs),
            ];
        }, $techs);
    }
}