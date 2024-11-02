<?php

namespace App\Http\Interfaces;

interface UserProfileInterface
{
    public static function add($request): bool;
    public static function destroy($request): bool;
}