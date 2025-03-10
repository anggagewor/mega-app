<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\Dota2Service
 */
class Dota2Service extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \App\Services\Dota2Service::class;
    }
}
