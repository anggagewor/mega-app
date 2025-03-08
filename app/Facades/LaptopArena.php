<?php

namespace App\Facades;

use App\Services\LaptopArenaService;
use Illuminate\Support\Facades\Facade;

/**
 * @see LaptopArenaService
 */
class LaptopArena extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return LaptopArenaService::class;
    }
}
