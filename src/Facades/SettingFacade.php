<?php

namespace LTTools\Extension\Facades;

use LTTools\Extension\Support\SettingSupport;
use Modules\Base\Facades\DbFacades;

/**
 * Class SettingFacade
 * @method  static mixed get($name, $default = null);
 * @package LTTools\Extension\Facades
 */
class SettingFacade extends DbFacades
{
    protected static function getFacadeAccessor()
    {
        return SettingSupport::class;
    }
}
