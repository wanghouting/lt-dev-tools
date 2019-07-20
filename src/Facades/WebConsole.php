<?php


namespace LTTools\Extension\Facades;


use Illuminate\Support\Facades\Facade;
use LTTools\Extension\Support\WebConsoleSupport;

/**
 * Class WebConsole
 * @method  static  execute_command($command)
 * @package LTTools\Extension\Facades
 */
class WebConsole extends Facade
{
    public static function getFacadeAccessor()
    {
        return WebConsoleSupport::class;
    }
}