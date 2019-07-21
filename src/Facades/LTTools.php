<?php
namespace LTTools\Extension\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class LTTools
 * @method  static  string getRunStateLabel($state);
 * @method static void run(bool $all);
 * @method  static string getNextRunTime($time_at);
 * @method static string showNav();
 * @package LTTools\Extension\Facades
 */
class LTTools extends  Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \LTTools\Extension\Support\LTTools::class;
    }
}