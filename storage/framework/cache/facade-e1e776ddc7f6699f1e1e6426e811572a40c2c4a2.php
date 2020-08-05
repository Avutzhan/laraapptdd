<?php

namespace Facades\Tests\Setup;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tests\Setup\ProjectFactory
 */
class ProjectFactory extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Tests\Setup\ProjectFactory';
    }
}
