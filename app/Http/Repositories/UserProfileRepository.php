<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\UserProfileInterface;
use App\Models\UserTechnology;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProfileRepository implements UserProfileInterface
{
    public static function add($data): bool
    {
        $user = Auth::user();

        try {
            foreach ($data->technologies as $technologyName) {
                UserTechnology::create([
                    'id_user' => $user->id,
                    'name' => $technologyName
                ]);
            }

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function destroy($data): bool
    {
        $user = Auth::user();

        try {
            if ($user) {
                DB::table('user_technologies')->where('id_user', $user->id)->delete();
            }
            
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}