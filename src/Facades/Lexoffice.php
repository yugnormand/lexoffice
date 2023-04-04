<?php

namespace Todocoding\Lexoffice\Facades;

use Illuminate\Support\Facades\Facade;

class Lexoffice extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lexoffice';
    }
}
