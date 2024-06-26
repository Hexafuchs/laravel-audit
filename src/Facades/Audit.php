<?php

namespace Hexafuchs\Audit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Hexafuchs\Audit\Audit
 */
class Audit extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Hexafuchs\Audit\Audit::class;
    }
}
