<?php 
namespace Atlas\Laravel;

/**
 * Atlas Facade
 *
 * @method static Atlas model($class) Get a model helper class.
 */
class Facade extends Illuminate\Support\Facades\Facade
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