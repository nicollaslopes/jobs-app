<?php

namespace App\Http\Interfaces;

interface UserProfileInterface
{
    public static function add($request): bool;
}