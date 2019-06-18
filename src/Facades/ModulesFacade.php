<?php


namespace LTTools\Extension\Facades;


use Illuminate\Support\Facades\Facade;
use LTTools\Extension\Support\ModulesSupport;

/**
 * Class ModulesFacade
 * @method  static  array getSubModulesData();
 * @method  static string getBranch();
 * @package LTTools\Extension\Facades
 */
class ModulesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ModulesSupport::class;
    }

}