<?php

namespace luqta\ViewCount\Facades;

use Illuminate\Support\Facades\Facade;

class ViewCount extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'viewcount';
    }
}
