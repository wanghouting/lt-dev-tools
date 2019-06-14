<?php
namespace LTUpdate\Extension\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class LTUpdate
 * @method  static  string getRunStateLabel($state);
 * @method static void run(bool $all);
 * @method  static string getNextRunTime($time_at);
 * @package LTUpdate\Extension\Facades
 */
class LTUpdate extends  Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \LTUpdate\Extension\Support\LTUpdate::class;
    }
}