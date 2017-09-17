<?php 
namespace Atlas\Laravel;

use Illuminate\Support\Facades\Facade;

/**
 * Atlas Facade
 *
 * @method static Atlas model($class) Get a model helper class.
 */
class AtlasFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'atlas';
    }
}