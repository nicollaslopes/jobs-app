<?php

namespace App\Http\Interfaces;

interface JobInterface
{
    public static function add($request): bool;
}