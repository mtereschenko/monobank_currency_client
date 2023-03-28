<?php

namespace App\Services\Monobank;

use Illuminate\Support\Facades\Facade;

class MonobankFacade extends Facade
{
    public const SERVICE_ACCESS_KEY = 'monobank_service';

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return self::SERVICE_ACCESS_KEY;
    }
}
